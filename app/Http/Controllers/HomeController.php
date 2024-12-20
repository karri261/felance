<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Employer;
use App\Models\Freelancer;
use App\Models\User;
use App\Models\Images;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = JobPost::latest('created_at')->take(5)->get();   
        $freelancers = Freelancer::orderBy('rating', 'desc')->take(8)->get();

        $session1 = Images::where('name', 'session1')->first();
        $session2 = Images::where('name', 'session2')->get();
        $brandlogo = Images::where('name', 'brand-logo')->get();

        $session2_id2 = Images::findOrFail(2);
        $session2_id3 = Images::findOrFail(3);
        $session2_id4 = Images::findOrFail(4);
        $session2_id5 = Images::findOrFail(5);
        $brandlogo_id6 = Images::findOrFail(6);
        $brandlogo_id7 = Images::findOrFail(7);
        $brandlogo_id8 = Images::findOrFail(8);  
        $brandlogo_id9 = Images::findOrFail(9);
        $brandlogo_id10 = Images::findOrFail(10);
        $brandlogo_id11 = Images::findOrFail(11);
        
        return view('welcome', compact('jobs', 'freelancers', 'session1', 'session2_id2', 'session2_id3', 'session2_id4', 'session2_id5', 'brandlogo_id6', 'brandlogo_id7', 'brandlogo_id8', 'brandlogo_id9', 'brandlogo_id10', 'brandlogo_id11'));
    }

    public function findJob()
    {
        $jobs = JobPost::where('status', 'approved')
            ->where('finish', 0)
            ->where('end_date', '>=', now())
            ->orderBy('created_at', 'desc')->paginate(7);
        return view('guest.findjob', compact('jobs'));
    }

    public function filterJobs(Request $request)
    {
        $query = JobPost::where('status', 'Approved');

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

        $jobs = $query->orderBy('created_at', 'desc')->paginate(7)->appends(request()->query());

        if ($request->ajax()) {
            return view('guest.job-list', compact('jobs'))->render();
        }

        return view('guest.findjob', compact('jobs'));
    }

    public function companyProfile($user_id)
    {
        $employer = Employer::where('user_id', $user_id)->first();
        $images = $employer && $employer->image_paths ? json_decode($employer->image_paths, true) : [];

        $userView = User::where('id', $user_id)->first();
        return view('guest.company-profile', compact('employer', 'images', 'userView'));
    }

    public function jobDetail($job_id)
    {
        $job = JobPost::findOrFail($job_id);

        $description = $this->convertToListItems($job->job_description);
        $responsibilities = $this->convertToListItems($job->responsibilities);
        $background = $this->convertToListItems($job->background);

        $relatedJobs = JobPost::where('categories', $job->categories)
            ->where('job_id', '!=', $job_id)
            ->take(5)
            ->get();

        return view('guest.job-detail', compact('job', 'responsibilities', 'description', 'background', 'relatedJobs'));
    }

    function convertToListItems($htmlContent)
    {
        preg_match_all('/<p>(.*?)<\/p>/', $htmlContent, $matches);
        return $matches[1];
    }
}
