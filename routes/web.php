<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


Route::get('/',[DashboardController::class,'index']);
Route::get('/allposts',function(){
    echo "Show all posts";
});
Route::get('/add_post',function(){
echo "<h1>Add post form</h1>";
});

Route::get('/admin/all_posts',[PostController::class,'allPosts']);
Route::get('/single_post',[PostController::class,'singlePost']);
Route::get('/all-posts',[PostController::class,'showAllPosts']);
Route::get('/sign-up',[UserController::class,'signupform']);
Route::get('/categories',[CategoryController::class,'allCategory']);
Route::get('/layout',[PostController::class,'layout']);

