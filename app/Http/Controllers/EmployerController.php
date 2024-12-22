<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Messages;
use App\Models\Employer;
use App\Models\JobPost;
use App\Models\Applicant;
use App\Models\Freelancer;
use App\Models\Rating;


class EmployerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $jobs = JobPost::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(7);

        foreach ($jobs as $job) {
            $job->pendingApplications = Applicant::where('job_id', $job->job_id)
                ->where('status', 'pending')
                ->count();
        }
        $employer = Employer::where('user_id', $user->id)->first();
        $missingInfo = !$employer->company_name || !$employer->address;
        $messages = Messages::all();
        return view('employer.index', compact('jobs', 'user', 'employer', 'messages', 'missingInfo'));
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

    public function deleteImage($index)
    {
        $userData = Session::get('user_data');
        $user = User::where('email', $userData['email'])->first();
        $employer = Employer::where('user_id', $user->id)->first();

        $imagePaths = json_decode($employer->image_paths, true);

        if (isset($imagePaths[$index])) {
            Storage::delete(str_replace('storage/', '', $imagePaths[$index]));

            unset($imagePaths[$index]);

            $imagePaths = array_values($imagePaths);

            $employer->image_paths = json_encode($imagePaths, JSON_UNESCAPED_SLASHES);
            $employer->save();

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

    public function postJob()
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();

        if (!$employer->company_name || !$employer->address) {
            return redirect()->route('employer')
                ->with('error', 'Please complete your company information before posting a job.');
        }
        return view('employer.postJob', compact('user', 'employer'));
    }

    public function postJobPOST(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'category' => 'required|string',
            'gender' => 'required|string',
            'salary_min' => 'required|numeric|min:0',
            'salary_max' => 'required|numeric|min:0',
            'opening' => 'required|integer|min:1',
            'experience' => 'required|integer|min:0',
            'qualification' => 'required|string',
            'career_level' => 'required|string',
            'end_date' => 'required|date',
            'short_describe' => 'required|string',
            'job_description' => 'required|string',
            'responsibilities' => 'required|string',
            'background' => 'required|string',
        ]);

        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();

        JobPost::create([
            'job_title' => $request->job_title,
            'company_name' => $employer->company_name,
            'company_logo' => $employer->company_logo,
            'location' => $employer->address,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'openings_position' => $request->opening,
            'experience_required' => $request->experience,
            'job_description' => $request->job_description,
            'responsibilities' => $request->responsibilities,
            'background' => $request->background,
            'gender' => $request->gender,
            'categories' => $request->category,
            'qualification' => $request->qualification,
            'career_level' => $request->career_level,
            'end_date' => $request->end_date,
            'short_describe' => $request->short_describe,
            'status' => 'Waiting for approval',
            'user_id' => $user->id,
        ]);

        return redirect()->route('employer')->with('success', 'Job post submitted and waiting for approval.');
    }

    public function editJob($job_id)
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();

        $job = JobPost::findOrFail($job_id);

        return view('employer.edit-job', compact('job', 'user', 'employer'));
    }

    public function editJobPost(Request $request, $job_id)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'category' => 'required|string',
            'gender' => 'required|string',
            'salary_min' => 'required|numeric|min:0',
            'salary_max' => 'required|numeric|min:0',
            'opening' => 'required|integer|min:1',
            'experience' => 'required|integer|min:0',
            'qualification' => 'required|string',
            'career_level' => 'required|string',
            'end_date' => 'required|date',
            'short_describe' => 'required|string',
            'job_description' => 'required|string',
            'responsibilities' => 'required|string',
            'background' => 'required|string',
        ]);

        $user = Auth::user();
        $job = JobPost::where('user_id', $user->id)->where('job_id', $job_id)->firstOrFail();

        $job->job_title = $request->job_title;
        $job->salary_min = $request->salary_min;
        $job->salary_max = $request->salary_max;
        $job->openings_position = $request->opening;
        $job->experience_required = $request->experience;
        $job->job_description = $request->job_description;
        $job->responsibilities = $request->responsibilities;
        $job->background = $request->background;
        $job->gender = $request->gender;
        $job->categories = $request->category;
        $job->qualification = $request->qualification;
        $job->career_level = $request->career_level;
        $job->end_date = $request->end_date;
        $job->short_describe = $request->short_describe;
        $job->save();

        return redirect()->route('employer')->with('success', 'Update successfully.');
    }

    public function deleteJob($job_id)
    {
        $job = JobPost::findOrFail($job_id);

        if (!$job) {
            return redirect()->back()->with('error', 'Job not found!');
        }

        $job->delete();

        return redirect()->route('employer')->with('success', 'Job deleted successfully!');
    }

    public function applicantList($job_id)
    {
        $user = Auth::user();
        $job = JobPost::findOrFail($job_id);
        $applicants = Applicant::with('user', 'job', 'freelancer')
            ->where('job_id', $job_id)
            ->get()
            ->map(function ($applicant) {
                $applicant->total_jobs = Applicant::where('user_id', $applicant->user_id)
                    ->where('status', 'accepted')
                    ->count();
                return $applicant;
            });
        $employer = Employer::where('user_id', $user->id)->first();

        return view('employer.applicant', compact('job', 'user', 'employer', 'applicants'));
    }

    public function applicantProfile($user_id, $job_id)
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();
        $job = JobPost::findOrFail($job_id);

        $applicant = Applicant::where('user_id', $user_id)
            ->where('job_id', $job_id)
            ->first();

        $freelancer = Freelancer::where('user_id', $user_id)->first();
        $images = json_decode($freelancer->image_paths, true);

        $userView = User::where('id', $user_id)->first();

        $completedJobs = JobPost::whereHas('applicants', function ($query) use ($userView) {
            $query->where('user_id', $userView->id)->where('finish', '1');
        })->with('applicants.rating')->paginate(3);

        return view('employer.applicant-profile', compact('user', 'job', 'freelancer', 'userView', 'employer', 'applicant', 'images', 'completedJobs'));
    }

    public function applicantProfileRate($user_id, $job_id)
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();
        $job = JobPost::findOrFail($job_id);

        $applicant = Applicant::where('user_id', $user_id)
            ->where('job_id', $job_id)
            ->first();

        $freelancer = Freelancer::where('user_id', $user_id)->first();
        $images = json_decode($freelancer->image_paths, true);

        $userView = User::where('id', $user_id)->first();
        $completedJobs = JobPost::whereHas('applicants', function ($query) use ($userView) {
            $query->where('user_id', $userView->id)->where('finish', '1');
        })->with('applicants.rating')->paginate(3);

        return view('employer.applicant-profile-rate', compact('user', 'job', 'freelancer', 'userView', 'employer', 'applicant', 'images', 'completedJobs'));
    }

    public function browserRequest(Request $request, $applicantId)
    {
        $applicant = Applicant::findOrFail($applicantId);

        $job = JobPost::findOrFail($applicant->job_id);
        $employer = Employer::where('user_id', $job->user_id)->first();

        if ($request->action === 'accept') {
            $applicant->status = 'accepted';
            $applicant->save();

            $appUser = User::where('id', $applicant->user_id)->first();

            $mailContent = [
                'applicantName' => $appUser->firstname . ' ' . $appUser->lastname,
                'jobTitle' => $job->job_title,
                'companyName' => $employer->company_name,
            ];

            Mail::to($appUser->email)->send(new \App\Mail\ApplicationAccept($mailContent));

            $conversationExists = Conversation::where(function ($query) use ($job, $applicant) {
                $query->where('user1_id', $job->user_id)
                    ->where('user2_id', $applicant->user_id);
            })->orWhere(function ($query) use ($job, $applicant) {
                $query->where('user1_id', $applicant->user_id)
                    ->where('user2_id', $job->user_id);
            })->exists();

            if (!$conversationExists) {
                Conversation::create([
                    'user1_id' => $job->user_id,
                    'user2_id' => $applicant->user_id,
                    'applicant_id' => $applicantId,
                ]);
            }
        } elseif ($request->action === 'reject') {
            $applicant->status = 'rejected';
            $applicant->save();
        }
        return redirect()->route('employer.applicantList', ['job_id' => $job->job_id])
            ->with('status', 'Applicant status updated successfully.');
    }

    public function markAsDone($job_id, Request $request)
    {
        $job = JobPost::find($job_id);

        $job->finish = $request->is_done;
        $job->save();
    }

    public function rating($job_id)
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();

        $job = JobPost::findOrFail($job_id);
        $applicants = Applicant::with('user', 'job', 'freelancer')
            ->where('job_id', $job_id)
            ->where('status', 'accepted')
            ->get()
            ->map(function ($applicant) {
                $applicant->total_jobs = Applicant::where('user_id', $applicant->user_id)
                    ->where('status', 'accepted')
                    ->count();
                return $applicant;
            });

        return view('employer.rating', compact('job', 'user', 'employer', 'applicants'));
    }

    public function ratePost(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'rate' => 'required|integer|min:1|max:5',
            'comment' => 'max:500'
        ]);

        Rating::create([
            'applicant_id' => $request->applicant_id,
            'score' => $request->rate,
            'comment' => $request->comment
        ]);

        $applicant = Applicant::findOrFail($request->applicant_id);

        $applicant_ids = Applicant::where('user_id', $applicant->user_id)->pluck('id');
        $averageRating = Rating::whereIn('applicant_id', $applicant_ids)->avg('score');

        $job_id = $applicant->job_id;
        $freelancer = Freelancer::where('user_id', $applicant->user_id)->first();
        $freelancer->rating = $averageRating;
        $freelancer->save();

        return redirect()->route('employer.rating', ['job_id' => $job_id])->with('success', 'Rating saved successfully!');
    }

    public function inbox()
    {
        $user = Auth::user();
        $jobs = JobPost::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(7);
        $employer = Employer::where('user_id', $user->id)->first();
        $messages = Messages::all();
        return view('employer.inbox', compact('jobs', 'user', 'employer', 'messages'));
    }
}
