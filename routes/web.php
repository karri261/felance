<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/reactive', [UserController::class, 'reActive'])->name('reActive');
Route::get('/inactive', [UserController::class, 'inactive'])->name('inactive');
Route::get('/banded', [UserController::class, 'banded'])->name('banded');

Route::get('/reset-password', [UserController::class, 'mailReset'])->name('mailReset');
Route::post('/reset-password', [UserController::class, 'postResetRequest'])->name('postResetRequest');

Route::get('/reset-password/resetPass', [UserController::class, 'resetPass'])->name('resetPass');
Route::post('/reset-password/resetPass', [UserController::class, 'postResetPass'])->name('postResetPass');
Route::post('/reset-password/resend-reset-code', [UserController::class, 'resendResetCode'])->name('resendResetCode');

Route::get('/inactive', [UserController::class, 'inactive'])->name('inactive');
Route::get('/banded', [UserController::class, 'banded'])->name('banded');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');

Route::get('/register/email-confirm', [UserController::class, 'emailconfirm'])->name('email-confirm');
Route::post('/register/verify-code', [UserController::class, 'verifyCode'])->name('verifyCode');
Route::post('/register/resend-verification-code', [UserController::class, 'resendVerificationCode'])->name('resendVerificationCode');

Route::get('/register/role', [UserController::class, 'role'])->name('role');
Route::post('/register/select-role', [UserController::class, 'selectRole'])->name('selectRole');

Route::get('/goodbye', [UserController::class, 'goodbye'])->name('goodbye');

Route::middleware(['auth'])->group(function () {
    Route::prefix('freelancer')->group(function () {
        Route::get('/', [FreelancerController::class, 'dashboard'])->name('freelancer');

        Route::get('/filter-jobs', [JobPostController::class, 'filterJobs'])->name('freelancer.filterJobs');
        Route::get('/job-detail/{job_id}', [JobPostController::class, 'jobDetail'])->name('freelancer.jobDetail');

        Route::get('/profile', [FreelancerController::class, 'profile'])->name('freelancer.profile');
        Route::post('/update-profile', [FreelancerController::class, 'updateProfile'])->name('freelancer.updateProfile');
        Route::post('/change-password', [FreelancerController::class, 'changePassword'])->name('freelancer.changePassword');
        Route::post('/deactivate-account', [FreelancerController::class, 'deactivateAccount'])->name('freelancer.deactivateAccount');

        Route::get('/lists', [FreelancerController::class, 'myLists'])->name('freelancer.myLists');
        Route::post('/favorite-job', [FreelancerController::class, 'favoriteJob'])->name('freelancer.favoriteJob');
        Route::post('/apply-job', [FreelancerController::class, 'applyJob'])->name('freelancer.applyJob');

        Route::get('/company_profile/{user_id}', [FreelancerController::class, 'companyProfile'])->name('freelancer.companyProfile');

        Route::get('/inbox', [FreelancerController::class, 'inbox'])->name('freelancer.inbox');
        Route::get('/conversations', [MessageController::class, 'getConversations']);
        Route::get('/conversations/{id}/messages', [MessageController::class, 'getMessages']);
        Route::post('/conversations/{id}/messages', [MessageController::class, 'sendMessage']);
        Route::post('/conversations', [MessageController::class, 'createConversation']);

        Route::post('/report', [ReportController::class, 'report'])->name('freelancer.report');

        Route::get('/finished-job', [FreelancerController::class, 'getCompletedJobs'])->name('freelancer.finishedJob');
    });

    Route::prefix('employer')->group(function () {
        Route::get('/', [EmployerController::class, 'dashboard'])->name('employer');

        Route::get('/profile', [EmployerController::class, 'profile'])->name('employer.profile');
        Route::post('/update-profile', [EmployerController::class, 'updateProfile'])->name('employer.updateProfile');
        Route::post('/change-password', [EmployerController::class, 'changePassword'])->name('employer.changePassword');
        Route::post('/deactivate-account', [EmployerController::class, 'deactivateAccount'])->name('employer.deactivateAccount');

        Route::get('/filter-jobs', [JobPostController::class, 'EmployfilterJobs'])->name('employer.filterJobs');
        Route::get('/job-detail/{job_id}', [JobPostController::class, 'EmployjobDetail'])->name('employer.jobDetail');
        Route::get('/edit-job/{job_id}', [EmployerController::class, 'editJob'])->name('employer.editJob');
        Route::post('/edit-job/{job_id}', [EmployerController::class, 'editJobPost'])->name('employer.editJobPost');
        Route::post('/delete-job/{job_id}', [EmployerController::class, 'deleteJob'])->name('employer.deleteJob');

        Route::get('/applicant/{job_id}', [EmployerController::class, 'applicantList'])->name('employer.applicantList');
        Route::get('/applicant_profile/{user_id}/{job_id}', [EmployerController::class, 'applicantProfile'])->name('employer.applicantProfile');
        Route::post('/applicants/{applicant_id}', [EmployerController::class, 'browserRequest'])->name('applicant.browserRequest');

        Route::get('/postJob', [EmployerController::class, 'postJob'])->name('employer.postJob');
        Route::post('/postJob', [EmployerController::class, 'postJobPOST'])->name('employer.postJobPOST');

        Route::post('/mark-as-done/{job_id}', [EmployerController::class, 'markAsDone'])->name('employer.markAsDone');
        Route::get('/applicant_profile-rate/{user_id}/{job_id}', [EmployerController::class, 'applicantProfileRate'])->name('employer.applicantProfileRate');
        Route::get('/rating/{job_id}', [EmployerController::class, 'rating'])->name('employer.rating');
        Route::post('/rate-freelancer', [EmployerController::class, 'ratePost'])->name('employer.rate');

        Route::post('/report', [ReportController::class, 'report'])->name('employer.report');

        Route::get('/inbox', [EmployerController::class, 'inbox'])->name('employer.inbox');
        Route::get('/conversations', [MessageController::class, 'getConversations']);
        Route::get('/conversations/{id}/messages', [MessageController::class, 'getMessages']);
        Route::post('/conversations/{id}/messages', [MessageController::class, 'sendMessage']);
        Route::post('/conversations', [MessageController::class, 'createConversation']);
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::get('/manage-user', [AdminController::class, 'index'])->name('manage-user');
        Route::prefix('approve-job-post')->group(function (){
            Route::get('/', [JobPostController::class, 'showWaitingJobs'])->name('approve.job.post');
            Route::get('/job-detail/{job_id}', [JobPostController::class, 'job_detail_for_admin'])->name(name: 'approve.jobDetail');
            Route::post('/approve-ok/{id}', [AdminController::class, 'approveOk'])->name('approve.ok');
            // Route::post('/approve-ok/{id}', [AdminController::class, 'approveOk'])->middleware('csrf');
            Route::post('/approve-no/{id}', [AdminController::class, 'approveNo'])->name('approve.no');
        });
        Route::prefix('manage-job')->group(function (){
            Route::get('/job-detail/{job_id}', [JobPostController::class, 'job_detail_for_admin'])->name(name: 'jobDetail');
            Route::get('/', [JobPostController::class, 'showManageJobs'])->name('filter-jobs');
            Route::delete('/delete/{job}', [AdminController::class, 'delete'])->name('job.delete');
        });
        Route::prefix('manage-report')->group(function (){
            Route::get('/', [ReportController::class, 'index'])->name('manage-report');
            Route::get('/report-detail/{report_id}', [ReportController::class, 'report_detail_for_admin'])->name('reportDetail');
        });
    });
    Route::post('/users/toggle-status/{id}', [AdminController::class, 'toggleStatus'])->name('users.toggle-status');
    Route::delete('/users/delete/{id}', [AdminController::class, 'delete'])->name('users.delete');
    Route::get('/freelancers/sort', [AdminController::class, 'sort'])->name('freelancers.sort');
    Route::get('/employers/sort', [AdminController::class, 'sortEmployer'])->name('employers.sort');

    });
