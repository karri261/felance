<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
use App\Models\JobPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $request->validate([
            'reported_user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
        ]);

        Report::create([
            'reporter_id' => Auth::id(),
            'reported_user_id' => $request->reported_user_id,
            'title' => $request->title,
            'detail' => $request->detail,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('status', 'Report submitted successfully.');
    }

    public function index()
    {
        $reports = Report::all();
        $waitingJobsCount = JobPost::where('status', 'Waiting for approval')->count();
        return view('Admin/pages.manage_report', compact('reports', 'waitingJobsCount'));
    }

    public function report_detail_for_admin($report_id)
    {
        $report = Report::find($report_id);
        $reporter = User::find($report->reporter_id);
        $reported = User::find($report->reported_user_id);
        $waitingJobsCount = JobPost::where('status', 'Waiting for approval')->count();
        return view('Admin/pages.report_detail', compact('report', 'waitingJobsCount', 'reporter', 'reported'));
    }

    public function noAction(Request $request)
    {
        $report = Report::find($request->report_id);

        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Report not found.']);
        }

        $report->status = $request->status;
        $report->save();

        // Mail::to($report->reporter->email)->send(new \App\Mail\ReportNoActionMail($request->email_content));

        return response()->json(['success' => true, 'message' => 'Report updated and email sent.']);
    }
    public function banUser(Request $request)
    {
        // Tìm report theo ID
        $report = Report::find($request->report_id);

        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Report not found.']);
        }

        // Cập nhật trạng thái report
        $report->status = "resolved";
        $report->save();

        // Logic để ban user (cập nhật cột trạng thái trong bảng user, ví dụ `banned = true`)
        $reportedUser = User::find($report->reported_user_id);
        if ($reportedUser) {
            $reportedUser->status = "banned";
            $reportedUser->save();
        }

        $reporter = User::find($report->reporter_id);

        // Gửi email đến reporter
        // Mail::to($request->reporter_email)->send(new \App\Mail\ReportResolvedMail(
        //     "Admin đã giải quyết report của bạn và quyết định ban người dùng bị báo cáo."
        // ));
        Mail::to($reporter->email)->send(new \App\Mail\ReportBanUserToReporterMail($request->email_to_reporter));


        // Gửi email đến reported user
        // Mail::to($request->reported_email)->send(new \App\Mail\BanReportedUserMail(
        //     "Tài khoản của bạn đã bị report với lý do: " . $request->report_reason
        // ));
        $mailContent = [
            'userName' => $reportedUser->firstname . ' ' . $reportedUser->lastname,
            'reason' => $request->email_to_reported,
        ];
        Mail::to($reportedUser->email)->queue(new \App\Mail\BanUser($mailContent));

        return response()->json(['success' => true, 'message' => 'User banned and emails sent.']);
    }
}
