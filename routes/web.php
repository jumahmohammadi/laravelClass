<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/',function(){ return view('web.home');});

// Route::middleware('auth')->group(function(){
Route::prefix('admin')->middleware("admin")->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashbaord');
    Route::get('/categories',[CategoryController::class,'index'])->name('categories');
    Route::get('/categories/add',[CategoryController::class,'add']);
    Route::post('/categories/save',[CategoryController::class,'saveCategory']);

  Route::controller(PostController::class)->group(function(){  
    Route::get('/posts','Posts')->name('posts');
    Route::get('/add_post','AddPost');
    Route::get('/edit_post','EditPost');
    Route::get('/delete_post','DeletePost');
  });


    Route::get('/users',function(){echo "user page";});
});
// });

