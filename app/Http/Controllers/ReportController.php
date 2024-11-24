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
}
