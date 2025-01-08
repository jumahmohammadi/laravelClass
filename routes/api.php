<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('sliders',[ApiController::class,'sliders']);
Route::get('posts_by_category/{category}/{limit}',[ApiController::class,'postsByCategory']);
Route::get('recent_posts/{limit}',[ApiController::class,'recentPost']);
Route::get('popular_posts/{limit}',[ApiController::class,'popularPost']);
Route::get('setting',[ApiController::class,'setting']);
Route::get('post/{id}',[ApiController::class,'SinglePost']);
Route::post('save_comment',[ApiController::class,'saveComment']);