<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use Carbon\Carbon;

class FreelancerController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu freelancers cùng các cột trong bảng users qua quan hệ
        $freelancers = Freelancer::with('user:id,firstname,lastname,status')->get();

        return view('Admin/pages.manage_user', compact('freelancers'));
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
        // return view('Admin/pages.manage_user', compact('freelancers'));
    }


}
