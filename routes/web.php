<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\MessageController;

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

        Route::get('/filter-jobs', [JobPostController::class, 'filterJobs'])->name('filterJobs');
        Route::get('/job-detail/{job_id}', [JobPostController::class, 'jobDetail'])->name('jobDetail');

        Route::get('/profile', [FreelancerController::class, 'profile'])->name('freelancer.profile');
        Route::post('/update-profile', [FreelancerController::class, 'updateProfile'])->name('freelancer.updateProfile');
        Route::post('/change-password', [FreelancerController::class, 'changePassword'])->name('freelancer.changePassword');
        Route::post('/deactivate-account', [FreelancerController::class, 'deactivateAccount'])->name('freelancer.deactivateAccount');

        Route::get('/lists', [FreelancerController::class, 'myLists'])->name('freelancer.myLists');
        Route::post('/favorite-job', [FreelancerController::class, 'favoriteJob'])->name('freelancer.favoriteJob');
        Route::post('/apply-job', [FreelancerController::class, 'applyJob'])->name('freelancer.applyJob');

        Route::get('/inbox', [FreelancerController::class, 'inbox'])->name('freelancer.inbox');
        Route::get('/conversations', [MessageController::class, 'getConversations']);
        Route::get('/conversations/{id}/messages', [MessageController::class, 'getMessages']);
        Route::post('/conversations/{id}/messages', [MessageController::class, 'sendMessage']);
        Route::post('/conversations', [MessageController::class, 'createConversation']);
    });

    Route::prefix('employer')->group(function () {
        Route::get('/', [EmployerController::class, 'dashboard'])->name('employer');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
    });
});
