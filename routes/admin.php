<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;


Route::get('lang/{lang}', function ($lang) {
    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'en') {
        session()->put('lang', 'en');
    } else {
        session()->put('lang', 'ar');
    }

    return back();
});
Route::get('/login', function () {

    return view('auth.login');
})->name('login');



Route::get('/', function () {
    return view('welcome');
});
Route::post('Login', [\App\Http\Controllers\frontController::class, 'login']);
Route::get('logout', [\App\Http\Controllers\frontController::class, 'logout']);

Route::get('forget-password', [\App\Http\Controllers\frontController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [\App\Http\Controllers\frontController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}/{email}', [\App\Http\Controllers\frontController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [\App\Http\Controllers\frontController::class, 'submitResetPasswordForm'])->name('reset.password.post');


        Route::get('Setting', [\App\Http\Controllers\Admin\AdminsController::class, 'Setting'])->name('profile');
        Route::post('UpdateProfile', [\App\Http\Controllers\Admin\AdminsController::class, 'UpdateProfile'])->name('UpdateProfile');


        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

        Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('datatable', [BlogController::class, 'datatable'])->name('datatable');
        Route::get('table-buttons', [BlogController::class, 'table_buttons'])->name('table_buttons');
        Route::post('store', [BlogController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BlogController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [BlogController::class, 'update'])->name('update');
        Route::post('delete', [BlogController::class, 'destroy'])->name('destroy');
        Route::post('change-active', [BlogController::class, 'changeActive'])->name('change_active');
});

