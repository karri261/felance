<?php

namespace App\Http\Controllers;

use App\Models\JobPost;

use App\Models\Employer;
use App\Models\User;

use Illuminate\Http\Request;

class JobPostController extends Controller
{
    public function index()
    {
        $jobs = JobPost::inRandomOrder()
            ->take(5)
            ->get();

        $jobs = JobPost::inRandomOrder()->paginate(5);
        return view('FE.index', compact('jobs'));
    }

    // public function applyJob(Request $request)
    // {
    //     // Logic xử lý apply job ở đây
    //     return redirect()->back()->with('success', 'Applied successfully!');
    // }

    public function showWaitingJobs()
    {
        // Lấy tất cả các job có status là "Waiting for approval"
        $jobs = JobPost::where('status', 'Waiting for approval')->paginate(10);
        return view('Admin/pages.approve_job_post', compact('jobs'));
    }

    public function job_detail_for_admin($job_id)
    {
        $job = JobPost::find($job_id); 

        $description = $this->convertToListItems($job->job_description);
        $responsibilities = $this->convertToListItems($job->responsibilities);
        $background = $this->convertToListItems($job->background);

        return view('Admin/pages.job_detail', compact('job', 'responsibilities', 'background', 'description'));
    }
    function convertToListItems($htmlContent)
    {
        preg_match_all('/<p>(.*?)<\/p>/', $htmlContent, $matches);
        return $matches[1];
    }

    public function filterJobs(Request $request)
    {
        $query = JobPost::query();

        // Filter by job name
        if ($request->filled('job_name')) {
            $query->where('job_title', 'like', '%' . $request->job_name . '%');
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Filter by categories
        if ($request->filled('categories')) {
            $query->whereIn('categories', $request->categories);
        }

        // Filter by salary range
        if ($request->filled('salary')) {
            switch ($request->salary) {
                case 'lt_50':
                    $query->where('salary_max', '<', 50);
                    break;
                case 'lt_100':
                    $query->where('salary_max', '<', 100);
                    break;
                case 'lt_250':
                    $query->where('salary_max', '<', 250);
                    break;
                case 'gt_250':
                    $query->where('salary_min', '>', 250);
                    break;
            }
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(7);

        if ($request->ajax()) {
            return view('Admin/pages.job_list_partial', compact('jobs'))->render();
        }

        return view('Admin/pages.manage_job', compact('jobs'));
    }

}
