<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCodeController;
use App\Http\Controllers\UserTweetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1'], function () {

    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('/check-verify', [UserCodeController::class, 'checkVerify'])->name('checkVerify');
        Route::post('/verify-code', [UserCodeController::class, 'verifyCode'])->name('verifyCode');
        Route::post('/verify-send-code', [UserCodeController::class, 'sendCode'])->name('sendCode');
        Route::get('/get-tweets/{username}', [UserTweetController::class, 'getTweets'])->name('getTweets');
        Route::post('/edit-tweet/{tweet_id}', [UserTweetController::class, 'editTweet'])->name('editTweet');
    });
});
