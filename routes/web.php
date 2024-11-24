<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;


Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('user.index');
});

// Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

Route::get('/', [HomeController::class, 'index']);
Route::get('/dbconn', function(){
    return view('dbconn');
});

// joblist
Route::get('/', [JobPostController::class, 'index'])->name('FE.index');
Route::get('/jobs/{job_id}', [JobPostController::class, 'jobDetail'])->name('jobDetail');
Route::post('/freelancer/apply-job', [JobPostController::class, 'applyJob'])->name('freelancer.applyJob');

//admin
// Route::get('/approve-job-post', function () {
//     return view('Admin.pages.approve_job_post');
// })->name('approve.job.post');
// Route::get('/manage-job', function () {
//     return view('Admin.pages.manage_job');
// })->name('manage-job');

// Route::get('/approve-job-post', [JobPostController::class, 'showWaitingJobs'])->name('approve.job.post');
// Route::get('/job-detail/{job_id}', [JobPostController::class, 'job_detail_for_admin'])->name('jobDetail');
// Route::get('/manage-job', [JobPostController::class, 'manageJobPosts'])->name('manage-job');
// Route::get('/manage-job', [JobPostController::class, 'filterJobs'])->name('manage-job');

////test
// Route::get('/approve-job-post', function () {
//     return view('Admin.pages.approve_job_post');
// })->name('approve.job.post');

// Route::get('/manage-user', function () {
//     return view('Admin.pages.manage_user');
// })->name('manage-user');

Route::get('/approve-job-post', [JobPostController::class, 'showWaitingJobs'])->name('approve.job.post');
Route::get('/job-detail/{job_id}', [JobPostController::class, 'job_detail_for_admin'])->name('jobDetail');
Route::get('/manage-job', [JobPostController::class, 'filterJobs'])->name('filter-jobs');

Route::get('/manage-user', [FreelancerController::class, 'index'])->name('manage-user');
Route::get('/users/toggle-status/{id}', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
Route::get('/freelancers/sort', [FreelancerController::class, 'sort'])->name('freelancers.sort');

Route::get('/manage-report', [ReportController::class, 'index'])->name('manage-report');
Route::get('/report-detail/{report_id}', [ReportController::class, 'report_detail_for_admin'])->name('reportDetail');





