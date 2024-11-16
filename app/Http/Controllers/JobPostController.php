<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Freelancer;

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
        
            if ($salaryRange === 'lt_100') {
                $query->where('salary_max', '<', 100);
            } elseif ($salaryRange === 'lt_500') {
                $query->where('salary_max', '<', 500);
            } elseif ($salaryRange === 'lt_1000') {
                $query->where('salary_max', '<', 1000);
            } elseif ($salaryRange === 'gt_1000') {
                $query->where('salary_min', '>', 1000);
            }
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(7);

        return view('freelancer.job-list', compact('jobs'))->render();
    }

    public function jobDetail($job_id)
    {
        $user = Auth::user();
        $freelancer = Freelancer::where('user_id', $user->id)->first();
        
        $job = JobPost::findOrFail($job_id);

        $responsibilities = $this->convertToListItems($job->responsibilities);
        $background = $this->convertToListItems($job->background);

        $isFavorited = $job->isFavoritedBy(Auth::id());
        
        return view('freelancer.job-detail', compact('job', 'responsibilities', 'background', 'user','freelancer', 'isFavorited'));
    }

    function convertToListItems($htmlContent)
    {
        preg_match_all('/<p>(.*?)<\/p>/', $htmlContent, $matches);
        return $matches[1];
    }
}
