<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view(view: 'welcome');
// });


Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('user.index');
});

Route::get('/', [HomeController::class, 'index']);
