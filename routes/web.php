<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


Route::get('/',function(){echo "Welcome to website";});
Route::get('/admin/dashboard',[DashboardController::class,'index']);
Route::get('/admin/posts',[PostController::class,'Posts']);

