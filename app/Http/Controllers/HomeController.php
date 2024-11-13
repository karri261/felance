<?php

namespace App\Http\Controllers;

use App\Models\JobPost; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('FE.index');
    }
    // public function showJobs()
    // {
    //     $jobs = JobPost::paginate(5); // Lấy danh sách công việc có phân trang
    //     return view('FE.index', compact('jobs')); // Trả dữ liệu đến view 'jobs.index'
    // }

}
