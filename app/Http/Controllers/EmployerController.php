<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Messages;

class EmployerController extends Controller
{
    public function dashboard()
    {
        $jobs = JobPost::orderBy('created_at', 'desc')->paginate(7);
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();
        $messages = Messages::all();
        return view('employer.index', compact('jobs', 'user','employer', 'messages'));
    }
    
    public function profile()
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();
        $imagePaths = json_decode($employer->image_paths);
        return view('employer.profile', compact('user', 'employer', 'imagePaths'));
    }

    public function updateProfile(Request $request)
    {
        $userData = Session::get('user_data');
        $user = User::where('email', $userData['email'])->first();

        $employer = Employer::where('user_id', $user->id)->first();

        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'languages' => 'nullable|string',
            'company_name' => 'nullable|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'bio' => 'nullable|string',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'image' => 'array|max:6',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();

        $employer->languages = $request->languages;
        $employer->address = $request->address;
        $employer->company_name = $request->company_name;
        $employer->phone_number = $request->phone_number;
        $employer->bio = $request->bio;
        $employer->facebook = $request->facebook;
        $employer->twitter = $request->twitter;
        $employer->instagram = $request->instagram;
        $employer->linkedin = $request->linkedin;

        if ($request->hasFile('avatar')) {
            $fileName = $request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('employer_assets/images', $fileName, 'public');
            $employer->company_logo = 'storage/' . $avatarPath;
        }

        $oldImagePaths = json_decode($employer->image_paths, true);
        $newImagePaths = $oldImagePaths;

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $index => $image) {
                $originalFilename = $image->getClientOriginalName();
                $path = $image->storeAs('employer_assets/images', $originalFilename, 'public');
                $newImagePaths[$index] = 'storage/' . $path;
            }
        }

        if (!empty($oldImagePaths)) {
            foreach ($oldImagePaths as $oldPath) {
                if (!isset($newImagePaths) || !in_array($oldPath, $newImagePaths)) {
                    Storage::delete(str_replace('storage/', '', $oldPath));
                }
            }
        }

        $employer->image_paths = json_encode($newImagePaths, JSON_UNESCAPED_SLASHES);
        $employer->save();

        return redirect()->route('employer.profile')->with('status', 'Update successfully!')->with('employer', $employer);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current-password' => 'required|string',
            'new-password' => 'required|string|confirmed',
        ]);

        $userData = Session::get('user_data');
        $user = User::where('email', $userData['email'])->first();

        if (!Hash::check($request->input('current-password'), $user->password)) {
            return back()->withErrors(['current-password' => 'The current password is incorrect.'])->withInput();
        }

        $user->password = Hash::make($request->input('new-password'));
        $user->save();

        return redirect()->route('employer.profile')->with('status', 'Password changed successfully!');
    }

    public function deactivateAccount(Request $request)
    {
        $userData = Session::get('user_data');
        $user = User::where('email', $userData['email'])->first();

        if (Hash::check($request->password, $user->password)) {
            $user->status = 'inactive';
            $user->save();

            Auth::logout();

            return redirect()->route('goodbye');
        } else {
            return back()->withErrors(['password' => 'The password you entered is incorrect.']);
        }
    }

    public function inbox()
    {
        $jobs = JobPost::orderBy('created_at', 'desc')->paginate(7);
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();
        $messages = Messages::all();
        return view('employer.inbox', compact('jobs', 'user', 'employer', 'messages'));
    }
}
