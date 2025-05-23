<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\DonationController;


Route::get('/register', [AuthController::class, 'register']);
Route::post('/news', [pageController::class, 'searchnews']);
Route::get('/ocean', [pageController::class, 'ocean']);
Route::get('/news/{id}', [pageController::class, 'newsdetail']);
Route::get('/donate', [pageController::class, 'donate']);
Route::get('/about-us', [pageController::class, 'aboutus']);
Route::get('/news', [pageController::class, 'news']);
Route::post('/regist', [AuthController::class, 'regist']);
Route::get('/', [pageController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('role:customer')->group(function(){
    // Route::get('/', [AuthController::class, 'test']);
    // Route::get('/add-post',[pageController::class, 'addPost']);
    Route::POST('/donations', [DonationController::class, 'insertDonations']);

});


Route::middleware('role:admin')->group(function(){
    // Route::get('/admin', function () {
    //     return view('admin');
    // });
    Route::get('/add-news', [NewsController::class, 'addNews']);
    Route::post('/input-news', [NewsController::class, 'inputnews']);
});
