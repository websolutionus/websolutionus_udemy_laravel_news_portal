<?php

use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthenticationController::class, 'handleLogin'])->name('handle-login');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');

    /** Reset passeord */
    Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [AdminAuthenticationController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminAuthenticationController::class, 'handleResetPassword'])->name('reset-password.send');


});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    /**Profile Routes */
    Route::put('profile-password-update/{id}', [ ProfileController::class, 'passwordUpdate'])->name('profile-password.update');
    Route::resource('profile', ProfileController::class);

    /** Language Route */
    Route::resource('language', LanguageController::class);

    /** Category Route */
    Route::resource('category', CategoryController::class);

    /** News Route */
    Route::get('fetch-news-category', [NewsController::class, 'fetchCategory'])->name('fetch-news-category');
    Route::get('toggle-news-status', [NewsController::class, 'toggleNewsStatus'])->name('toggle-news-status');
    Route::resource('news', NewsController::class);


});


