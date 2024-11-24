<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

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
        return view('Admin/pages.manage_report', compact('reports'));
    }
    public function report_detail_for_admin($report_id)
    {
        $report = Report::find($report_id);
        return view('Admin/pages.report_detail', compact('report'));
    }
}
