<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPostController;

// Route::get('/', function () {
//     return view(view: 'welcome');
// });


Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('user.index');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/dbconn', function(){
    return view('dbconn');
});

// joblist
Route::get('/', [JobPostController::class, 'index'])->name('FE.index');
Route::get('/jobs/{job_id}', [JobPostController::class, 'jobDetail'])->name('jobDetail');
Route::post('/freelancer/apply-job', [JobPostController::class, 'applyJob'])->name('freelancer.applyJob');

