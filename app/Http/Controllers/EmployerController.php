<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost;
use App\Models\Freelancer;
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
    
}
