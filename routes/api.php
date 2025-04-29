<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Front\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->middleware([\App\Http\Middleware\Lang::class])->group(function () {

    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/header', [HomeController::class, 'header']);
    Route::get('/footer', [HomeController::class, 'footer']);
    Route::get('/about', [HomeController::class, 'about']);
        Route::get('/members', [HomeController::class, 'members']);
        Route::get('/governance', [HomeController::class, 'governance']);
    Route::get('/category', [HomeController::class, 'category']);
    Route::get('/Project', [HomeController::class, 'Project']);

});

Route::prefix('client')->group(function () {

    Route::post('/login', [\App\Http\Controllers\Api\Provider\AuthController::class, 'login']);
    Route::group(['middleware' => [\App\Http\Middleware\ApiProviderrMiddleware::class]], function () {
        Route::get('/participation', [\App\Http\Controllers\Api\Provider\ParticipationController::class, 'Participation']);
        Route::get('/check-code', [\App\Http\Controllers\Api\Provider\ParticipationController::class, 'checkCode']);
        Route::post('/update-code-status', [\App\Http\Controllers\Api\Provider\ParticipationController::class, 'updateCodeStatus']);
    });
});
