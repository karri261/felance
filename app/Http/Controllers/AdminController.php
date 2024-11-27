<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\JobPost;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin');
        }

        return back()->withErrors(['error' => 'Incorrect email or password.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    
    public function index()
    {
        $freelancers = Freelancer::with('user:id,firstname,lastname,status')->get();
        $waitingJobsCount = JobPost::where('status', 'Waiting for approval')->count();
        return view('Admin/index', compact('freelancers', 'waitingJobsCount'));
    }

    public function magUser()
    {
        $freelancers = Freelancer::with('user:id,firstname,lastname,status')->get();
        $waitingJobsCount = JobPost::where('status', 'Waiting for approval')->count();
        return view('Admin/pages.manage_user', compact('freelancers', 'waitingJobsCount'));
    }

    public function sort(Request $request)
    {
        $order = $request->get('order', 'latest');
        $freelancers = Freelancer::with('user');

        if ($order === 'latest') {
            $freelancers = $freelancers->orderBy('created_at', 'desc');
        } else if ($order === 'oldest') {
            $freelancers = $freelancers->orderBy('created_at', 'asc');
        }

        $freelancers = $freelancers->get()->map(function ($freelancer) {
            $freelancer->formatted_date = Carbon::parse($freelancer->created_at)->format('d-m-Y');
            return $freelancer;
        });

        return response()->json([
            'success' => true,
            'freelancers' => $freelancers,
        ]);
    }

    public function toggleStatus($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        $user->status = $user->status === 'active' ? 'banned' : 'active';
        $user->save();

        return response()->json([$id, 'success' => true, 'new_status' => $user->status]);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        try {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete user.']);
        }
    }
}
