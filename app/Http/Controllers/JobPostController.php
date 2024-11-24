<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Freelancer;
use App\Models\Applicant;

class JobPostController extends Controller
{
    public function filterJobs(Request $request)
    {
        $query = JobPost::query();

        if ($request->filled('job_name')) {
            $query->where('job_title', 'like', '%' . $request->job_name . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('categories')) {
            $query->whereIn('categories', $request->categories);
        }

        if ($request->filled('salary')) {
            $salaryRange = $request->salary;

            if ($salaryRange === 'lt_50') {
                $query->where('salary_max', '<', 50);
            } elseif ($salaryRange === 'lt_100') {
                $query->where('salary_max', '<', 100);
            } elseif ($salaryRange === 'lt_250') {
                $query->where('salary_max', '<', 250);
            } elseif ($salaryRange === 'gt_250') {
                $query->where('salary_min', '>', 250);
            }
        }

        if ($request->filled('status')) {
            $status = $request->status;

            if ($status === 'Waiting for approval') {
                $query->where('status', 'Waiting for approval');
            } elseif ($status === 'Approved') {
                $query->where('status', 'Approved');
            } elseif ($status === 'Rejected') {
                $query->where('status', 'Rejected');
            }
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(7);

        return view('freelancer.job-list', compact('jobs'))->render();
    }

    public function EmployfilterJobs(Request $request)
    {
        $query = JobPost::query();

        if ($request->filled('job_name')) {
            $query->where('job_title', 'like', '%' . $request->job_name . '%');
        }


        if ($request->filled('status')) {
            $status = $request->status;

            if ($status === 'wait') {
                $query->where('status', 'Waiting for approval');
            } elseif ($status == 'approve') {
                $query->where('status', 'Approved');
            } elseif ($status == 'reject') {
                $query->where('status', 'Rejected');
            }
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(7);

        return view('employer.job-list', compact('jobs'))->render();
    }

    public function jobDetail($job_id)
    {
        $user = Auth::user();
        $freelancer = Freelancer::where('user_id', $user->id)->first();

        $job = JobPost::findOrFail($job_id);

        $description = $this->convertToListItems($job->job_description);
        $responsibilities = $this->convertToListItems($job->responsibilities);
        $background = $this->convertToListItems($job->background);

        $isFavorited = $job->isFavoritedBy(Auth::id());

        $relatedJobs = JobPost::where('categories', $job->categories)
        ->where('job_id', '!=', $job_id) // Loại bỏ công việc hiện tại
        ->take(5) // Giới hạn số lượng công việc liên quan
        ->get();

        return view('freelancer.job-detail', compact('job', 'responsibilities', 'description', 'background', 'user', 'freelancer', 'isFavorited', 'relatedJobs'));
    }

    public function EmployjobDetail($job_id)
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();

        $job = JobPost::findOrFail($job_id);

        $pendingApplications = Applicant::where('job_id', $job_id)
            ->where('status', 'pending')
            ->count();

        $description = $this->convertToListItems($job->job_description);
        $responsibilities = $this->convertToListItems($job->responsibilities);
        $background = $this->convertToListItems($job->background);

        return view('employer.job-detail', compact('job', 'responsibilities', 'background', 'description', 'user', 'employer', 'pendingApplications'));
    }

    function convertToListItems($htmlContent)
    {
        preg_match_all('/<p>(.*?)<\/p>/', $htmlContent, $matches);
        return $matches[1];
    }
}
