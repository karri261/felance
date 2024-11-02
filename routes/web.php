<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');

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

Route::get('/freelancer', [UserController::class, 'freelancer'])->name('freelancer');
Route::get('/employer', [UserController::class, 'employer'])->name('employer');

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('user.index');
});
