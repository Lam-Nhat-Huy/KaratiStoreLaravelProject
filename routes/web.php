<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\AuthLoginMiddleware;
use Illuminate\Support\Facades\Route;

/* BACKEND ROUTES */

Route::get('/', function () {
    return 'Hello World';
});

Route::get('/quan-tri', [AuthController::class, 'index'])->name('auth.index')->middleware(AuthLoginMiddleware::class);
Route::post('/login-post', [AuthController::class, 'login'])->name('auth.login');
Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('admin')->middleware(AuthenticateMiddleware::class)->group(function () {
    Route::get('/trang-chu', [DashboardController::class, 'index'])->name('dashboard.index');
});
