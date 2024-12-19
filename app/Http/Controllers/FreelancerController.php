<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\JobPost;
use App\Models\Freelancer;
use App\Models\Favorite;
use App\Models\Applicant;
use App\Models\Employer;
use App\Models\Messages;
use Carbon\Carbon;

class FreelancerController extends Controller
{
    public function dashboard()
    {
        $jobs = JobPost::where('status', 'approved' )
        ->where('finish', 0)
        ->where('end_date', '>=', now())
        ->orderBy('created_at', 'desc')->paginate(7);
        $user = Auth::user();
        $freelancer = Freelancer::where('user_id', $user->id)->first();
        return view('freelancer.index', compact('jobs', 'user', 'freelancer'));
    }

    public function profile()
    {
        $user = Auth::user();
        $freelancer = Freelancer::where('user_id', $user->id)->first();
        $imagePaths = json_decode($freelancer->image_paths);
        return view('freelancer.profile', compact('user', 'freelancer', 'imagePaths'));
    }

    public function updateProfile(Request $request)
    {
        $userData = Session::get('user_data');
        $user = User::where('email', $userData['email'])->first();

        $freelancer = Freelancer::where('user_id', $user->id)->first();

        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'languages' => 'nullable|string',
            'cv' => 'mimes:pdf,doc,docx|max:2048',
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

        $freelancer->languages = $request->languages;
        $freelancer->address = $request->address;
        $freelancer->phone_number = $request->phone_number;
        $freelancer->bio = $request->bio;
        $freelancer->facebook = $request->facebook;
        $freelancer->twitter = $request->twitter;
        $freelancer->instagram = $request->instagram;
        $freelancer->linkedin = $request->linkedin;

        if ($request->hasFile('avatar')) {
            $fileName = $request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('freelancer_assets/images', $fileName, 'public');
            $freelancer->avatar = 'storage/' . $avatarPath;
        }

        if ($request->file('cv')) {
            $originalFilename = $request->file('cv')->getClientOriginalName();
            $path = $request->file('cv')->storeAs('freelancer_assets/cv', $originalFilename, 'public');

            $freelancer->cv_path = 'storage/' . $path;
        }

        $oldImagePaths = json_decode($freelancer->image_paths, true);
        $newImagePaths = $oldImagePaths;

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $index => $image) {
                $originalFilename = $image->getClientOriginalName();
                $path = $image->storeAs('freelancer_assets/images', $originalFilename, 'public');
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

        $freelancer->image_paths = json_encode($newImagePaths, JSON_UNESCAPED_SLASHES);
        $freelancer->save();

        return redirect()->route('freelancer.profile')->with('status', 'Update successfully!')->with('freelancer', $freelancer);
    }

    public function deleteImage($index)
    {
        $userData = Session::get('user_data');
        $user = User::where('email', $userData['email'])->first();
        $freelancer = Freelancer::where('user_id', $user->id)->first();

        $imagePaths = json_decode($freelancer->image_paths, true);

        if (isset($imagePaths[$index])) {
            Storage::delete(str_replace('storage/', '', $imagePaths[$index]));

            unset($imagePaths[$index]);

            $imagePaths = array_values($imagePaths);

            $freelancer->image_paths = json_encode($imagePaths, JSON_UNESCAPED_SLASHES);
            $freelancer->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
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

        return redirect()->route('freelancer.profile')->with('status', 'Password changed successfully!');
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
    public function myLists()
    {
        $user = Auth::user();
        $userId = $user->id;

        $freelancer = Freelancer::where('user_id', $userId)->first();
        $imagePaths = json_decode($freelancer->image_paths);

        $favoriteJobs = Favorite::where('user_id', $userId)->with('job')->paginate(4);
        $applicants = Applicant::where('user_id', $userId)->with('job')->paginate(4);

        return view('freelancer.my-list', compact('user', 'freelancer', 'imagePaths', 'favoriteJobs', 'applicants'));
    }

    public function favoriteJob(Request $request)
    {
        $userId = Auth::id();
        $jobId = $request->job_id;

        $favorite = Favorite::where('user_id', $userId)
            ->where('job_id', $jobId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json([
                'status' => 'success',
                'action' => 'unfavorited'
            ]);
        } else {
            Favorite::create([
                'user_id' => $userId,
                'job_id' => $jobId
            ]);
            return response()->json([
                'status' => 'success',
                'action' => 'favorited'
            ]);
        }
    }

    public function companyProfile($user_id)
    {
        $user = Auth::user();
        $freelancer = Freelancer::where('user_id', $user->id)->first();

        $employer = Employer::where('user_id', $user_id)->first();
        $images = $employer && $employer->image_paths ? json_decode($employer->image_paths, true) : [];

        $userView = User::where('id', $user_id)->first();
        return view('freelancer.company-profile', compact('user', 'freelancer', 'userView', 'employer', 'images'));
    }

    public function applyJob(Request $request)
    {
        $userId = Auth::id();
        $jobId = $request->input('job_id');

        $existingApplication = Applicant::where('user_id', $userId)->where('job_id', $jobId)->first();

        if ($existingApplication) {
            return redirect()->route('freelancer.myLists')->with('status', 'You have already applied for this job.');
        } else {
        }
        Applicant::create([
            'user_id' => $userId,
            'job_id' => $jobId,
            'status' => 'pending',
            'applied_at' => now(),
        ]);
        return redirect()->route('freelancer.myLists')->with('status', 'Application submitted successfully!');
    }

    public function inbox()
    {
        $jobs = JobPost::orderBy('created_at', 'desc')->paginate(7);
        $user = Auth::user();
        $freelancer = Freelancer::where('user_id', $user->id)->first();
        $messages = Messages::all();
        return view('freelancer.inbox', compact('jobs', 'user', 'freelancer', 'messages'));
    }

    public function getCompletedJobs()
    {
        $user = Auth::user();
        $freelancer = Freelancer::where('user_id', $user->id)->first();

        $completedJobs = JobPost::whereHas('applicants', function ($query) use ($user) {
            $query->where('user_id', $user->id)->where('finish', '1');
        })->with('applicants.rating')->paginate(5);

        return view('freelancer.finishedJob', compact('completedJobs', 'freelancer', 'user'));
    }
}
