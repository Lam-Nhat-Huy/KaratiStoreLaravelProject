<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\UserCatalogueController;
use App\Http\Controllers\Admin\PostCatalogueController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\AuthLoginMiddleware;
use Illuminate\Support\Facades\Route;

/* BACKEND ROUTES */

Route::get('/', [AuthController::class, 'index'])->name('auth.index')->middleware(AuthLoginMiddleware::class);
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

    Route::prefix('user/catalogue')->group(function () {
        Route::get('/index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index');
        Route::get('/heal', [UserCatalogueController::class, 'healthy_testing'])->name('user.catalogue.healthy_testing');

        Route::get('/create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create');
        Route::post('/store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store');

        Route::get('/edit/{id}', [UserCatalogueController::class, 'edit'])->name('user.catalogue.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [UserCatalogueController::class, 'update'])->name('user.catalogue.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [UserCatalogueController::class, 'delete'])->name('user.catalogue.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [UserCatalogueController::class, 'destroy'])->name('user.catalogue.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('language')->group(function () {
        Route::get('/index', [LanguageController::class, 'index'])->name('language.index');

        Route::get('/create', [LanguageController::class, 'create'])->name('language.create');
        Route::post('/store', [LanguageController::class, 'store'])->name('language.store');

        Route::get('/edit/{id}', [LanguageController::class, 'edit'])->name('language.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [LanguageController::class, 'update'])->name('language.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [LanguageController::class, 'delete'])->name('language.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [LanguageController::class, 'destroy'])->name('language.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('post/catalogue')->group(function () {
        Route::get('/index', [PostCatalogueController::class, 'index'])->name('post.catalogue.index');
        Route::get('/heal', [PostCatalogueController::class, 'healthy_testing'])->name('post.catalogue.healthy_testing');

        Route::get('/create', [PostCatalogueController::class, 'create'])->name('post.catalogue.create');
        Route::post('/store', [PostCatalogueController::class, 'store'])->name('post.catalogue.store');

        Route::get('/edit/{id}', [PostCatalogueController::class, 'edit'])->name('post.catalogue.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [PostCatalogueController::class, 'update'])->name('post.catalogue.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [PostCatalogueController::class, 'delete'])->name('post.catalogue.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [PostCatalogueController::class, 'destroy'])->name('post.catalogue.destroy')->where(['id' => '[0-9]+']);
    });
});


/* AJAX */
Route::get('/ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index');
Route::post('/ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');
Route::post('/ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');
