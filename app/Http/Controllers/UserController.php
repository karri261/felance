<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use App\Models\Freelancer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    //============================LOGIN FUNCTION============================//
    public function login()
    {
        return view('guest.login');
    }

    public function postLogin(Request $req)
    {
        $req->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $user = Auth::user();

            if ($user->status === 'active') {
                Session::put('user_data', ['email' => $user->email]);
                return $user->role_id === 1 ? redirect()->route('admin')
                    : ($user->role_id === 2 ? redirect()->route('freelancer')
                    : redirect()->route('employer'));
            } elseif ($user->status === 'inactive') {
                Session::put('user_data', ['email' => $user->email]);
                return redirect()->route('inactive', ['updatedAt' => $user->updated_at->format('d-m-Y')]);
            } elseif ($user->status === 'banded') {
                return redirect()->route('banded');
            }
        } else {
            return back()->withErrors(['error' => 'Incorrect email or password.']);
        }
    }

    public function reActive(Request $request)
    {
        $userData = Session::get('user_data');

        $user = User::where('email', $userData['email'])->first();
        $user->status = 'active';
        $user->save();

        Session::forget('user_data');
        Auth::login($user);

        return $user->role_id === 2 ? redirect()->route('freelancer') : redirect()->route('employer');
    }

    //============================FORGOT PASSWORD FUNCTION============================//

    public function mailReset()
    {
        return view('guest.mailreset');
    }

    public function postResetRequest(Request $req)
    {
        $req->validate(['email' => 'required|email|exists:users,email']);

        $resetCode = rand(100000, 999999);

        session([
            'resetCode' => $resetCode,
            'resetEmail' => $req->email
        ]);

        Mail::to($req->email)->send(new \App\Mail\ResetCodeMail($resetCode));

        return redirect()->route('resetPass');
    }

    public function resetPass()
    {
        return view('guest.resetpass');
    }

    public function postResetPass(Request $req)
    {
        $req->validate([
            'new-password' => 'required|confirmed',
            'code' => 'required|numeric',
        ], [
            'new-password.confirmed' => 'Confirmation password does not match.',
        ]);

        if ($req->code != session('resetCode')) {
            return back()->withErrors(['code' => 'Invalid verification code.']);
        }

        $email = session('resetEmail');
        if (!$email) {
            return back()->withErrors(['error' => 'Reset password session expired. Please try again.']);
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['error' => 'User not found.']);
        }
        $user->password = bcrypt($req->input('new-password'));
        $user->save();

        $req->session()->forget(['resetCode', 'resetEmail']);

        // Redirect to login page
        return redirect()->route('login')->with('success', 'Password has been reset successfully.');
    }

    public function resendResetCode()
    {
        $email = session('resetEmail');

        $resetCode = rand(100000, 999999);
        session([
            'resetCode' => $resetCode,
            'resetEmail' => $email
        ]);

        Mail::to($email)->send(new \App\Mail\ResetCodeMail($resetCode));

        return back()->with('message', 'A new reset code has been sent to your email.');
    }

    //============================REGISTER FUNCTION============================//

    public function register()
    {
        return view('guest.register');
    }

    public function postRegister(Request $req)
    {
        // Xác thực dữ liệu
        $req->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'agree' => 'accepted',
        ], [
            'agree.accepted' => 'You must agree to the user agreement and privacy policy.',
            'password.confirmed' => 'Confirmation password does not match.',
        ]);

        // Lưu thông tin người dùng vào session
        Session::put('user_data', [
            'firstname' => $req->firstname,
            'lastname' => $req->lastname,
            'email' => $req->email,
            'password' => bcrypt($req->password),
        ]);

        $verificationCode = rand(100000, 999999);
        Session::put('verification_code', $verificationCode);

        Mail::to($req->email)->send(new \App\Mail\VerificationCodeMail($verificationCode));

        return redirect()->route('email-confirm')->with('email', $req->email);
    }

    public function emailconfirm()
    {
        return view('guest.emailconfirm', ['email' => Session::get('user_data')['email']]);
    }

    public function verifyCode(Request $req)
    {
        $req->validate([
            'code' => 'required|numeric',
        ]);

        if ($req->code == Session::get('verification_code')) {

            $userData = Session::get('user_data');
            // User::create($userData);

            return redirect()->route('role');
        } else {
            return back()->withErrors(['code' => 'Verification code is incorrect. Please try again.']);
        }
        // Xóa thông tin khỏi session
        Session::forget(['user_data', 'verification_code']);
    }

    public function resendVerificationCode()
    {
        $verificationCode = rand(100000, 999999);
        Session::put('verification_code', $verificationCode);

        $email = Session::get('user_data')['email'];
        Mail::to($email)->send(new \App\Mail\VerificationCodeMail($verificationCode));

        return back()->with('message', 'A new verification code has been sent to your email.');
    }

    public function role()
    {
        return view('guest.role');
    }

    public function selectRole(Request $request)
    {
        $roleId = $request->input('role_id');

        // Lấy thông tin người dùng từ session
        $userData = Session::get('user_data');
        $userData['role_id'] = $roleId;
        // Lưu người dùng vào bảng users
        $user = User::create($userData);

        if ($roleId == 2) {
            Freelancer::create(['user_id' => $user->id]);
            return redirect()->route('freelancer');
        } elseif ($roleId == 3) {
            Employer::create(['user_id' => $user->id]);
            return redirect()->route('employer');
        }
    }


    public function inactive(Request $request)
    {
        $updatedAt = $request->query('updatedAt');
        $updatedAt = \Carbon\Carbon::parse($updatedAt);

        return view('guest.inactive', compact('updatedAt'));
    }

    public function banded()
    {
        return view('guest.banded');
    }

    public function goodbye()
    {
        return view('user.bye');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_data');
        $request->session()->invalidate();
        return redirect('/login');
    }
}
