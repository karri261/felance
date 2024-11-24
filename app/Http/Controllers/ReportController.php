<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;


class ReportController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu freelancers cùng các cột trong bảng users qua quan hệ
        $reports = Report::all();
        return view('Admin/pages.manage_report', compact('reports'));
    }
    public function report_detail_for_admin($report_id)
    {
        $report = Report::find($report_id); 
        return view('Admin/pages.report_detail', compact('report'));
    }
}
