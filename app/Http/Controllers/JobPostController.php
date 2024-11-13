<?php

namespace App\Http\Controllers;

use App\Models\JobPost;  // Thay đổi từ Job sang JobPost
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    public function index()
    {
        // Lấy 5 công việc ngẫu nhiên
        $jobs = JobPost::inRandomOrder()
            ->take(5)
            ->get();

        // Hoặc nếu bạn vẫn muốn phân trang
        $jobs = JobPost::inRandomOrder()->paginate(5);

        return view('FE.index', compact('jobs'));
    }
    public function jobDetail($job_id)
    {
        $job = JobPost::where('job_id', $job_id)->firstOrFail();
        return view('jobs.detail', compact('job'));
    }

    public function applyJob(Request $request)
    {
        // Logic xử lý apply job ở đây
        return redirect()->back()->with('success', 'Applied successfully!');
    }
}