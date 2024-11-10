<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    echo "Hello Home page";
});
Route::get('/all_blog',function(){
    echo "Show all posts";
});
Route::get('/add_post',function(){
echo "<h1>Add post form</h1>";
});

Route::get('/all_posts',[PostController::class,'allPosts']);
Route::get('/single_post',[PostController::class,'singlePost']);
Route::get('/all-posts',[PostController::class,'showAllPosts']);
Route::get('/sign-up',[UserController::class,'signupform']);

