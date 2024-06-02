<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Ajax\LocationController;
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

    Route::prefix('user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');

        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->where(['id' => '[0-9]+']);
    });
});


/* AJAX */
Route::get('/ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index');
