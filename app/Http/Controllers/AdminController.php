<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\Employer;
use App\Models\User;
use Carbon\Carbon;
use App\Models\JobPost;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu freelancers cùng các cột trong bảng users qua quan hệ
        $freelancers = Freelancer::with('user:id,firstname,lastname,status')->get();
        $employers = Employer::with('user:id,firstname,lastname,status')->get();
        return view('Admin/pages.manage_user', compact('freelancers', 'employers'));
    }

    public function sort(Request $request)
    {
        $order = $request->get('order', 'latest');
        $freelancers = Freelancer::with('user');

        if ($order === 'latest') {
            $freelancers = $freelancers->orderBy('created_at', 'desc');
        } else if ($order === 'oldest') {
            $freelancers = $freelancers->orderBy('created_at', 'asc');
        }

        $freelancers = $freelancers->get()->map(function ($freelancer) {
            $freelancer->formatted_date = Carbon::parse($freelancer->created_at)->format('d-m-Y');
            return $freelancer;
        });

        return response()->json([
            'success' => true,
            'freelancers' => $freelancers,
        ]);
    }

    public function sortEmployer(Request $request)
    {
        $order = $request->get('order', 'latest');
        $employers = Employer::with('user');

        if ($order === 'latest') {
            $employers = $employers->orderBy('created_at', 'desc');
        } else if ($order === 'oldest') {
            $employers = $employers->orderBy('created_at', 'asc');
        }

        $employers = $employers->get()->map(function ($employer) {
            $employer->formatted_date = Carbon::parse($employer->created_at)->format('d-m-Y');
            return $employer;
        });

        return response()->json([
            'success' => true,
            'employers' => $employers,
        ]);
    }
    public function toggleStatus(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }
        $reason = $request->input('reason', null);
        if ($reason === null)
            $reason = "no reason";

        if ($user->status === 'active') {
            $mailContent = [
                'userName' => $user->firstname . ' ' . $user->lastname,
                'reason' => $reason,
            ];

            Mail::to($user->email)->queue(new \App\Mail\BanUser($mailContent));
        } else {
            $mailContent = [
                'userName' => $user->firstname . ' ' . $user->lastname,
            ];
            Mail::to($user->email)->queue(new \App\Mail\UnbanUser($mailContent));
        }

        $user->status = $user->status === 'active' ? 'banned' : 'active';
        $user->save();

        return response()->json([$id, 'success' => true, 'new_status' => $user->status]);
    }

    public function approveOk($id)
    {
        try {
            $jobPost = JobPost::findOrFail($id);
            $jobPost->status = 'Approved';
            $jobPost->save();
            $user = User::where('id', $jobPost->user_id)->first();

            $mailContent = [
                'employerName' => $user->firstname . ' ' . $user->lastname,
                'jobTitle' => $jobPost->job_title,
                // 'jobUrl' => route('jobs.show', $jobPost->id), // Link tới bài đăng đã được phê duyệt
            ];
            Mail::to($user->email)->queue(new \App\Mail\JobApproved($mailContent));

            return response()->json([
                'success' => true,
                'message' => 'Đã phê duyệt bài đăng thành công!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra tại đây: ' . $e->getMessage()
            ], 500);
        }
    }
    public function approveNo(Request $request, $id)
    {
        try {
            $jobPost = JobPost::findOrFail($id);
            $jobPost->status = 'Rejected';
            $jobPost->save();
            $user = User::where('id', $jobPost->user_id)->first();

            $reason = $request->input('reason', null);
            if ($reason === null)
                $reason = "no reason";

            $mailContent = [
                'employerName' => $user->firstname . ' ' . $user->lastname,
                'jobTitle' => $jobPost->job_title,
                'reason' => $reason,
                // 'jobUrl' => route('jobs.show', $jobPost->id), // Link tới bài đăng đã được phê duyệt
            ];
            Mail::to($user->email)->queue(new \App\Mail\JobRejected($mailContent));


            return response()->json([
                'success' => true,
                'message' => 'Đã từ chối bài đăng!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi từ chối bài đăng: ' . $e->getMessage()
            ], 500);
        }
    }


}
