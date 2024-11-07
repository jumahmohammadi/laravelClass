<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

