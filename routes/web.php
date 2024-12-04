<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;

Route::middleware('lang')->group(function(){
    Route::get('/',function(){ return view('web.home');});
    Route::get('/change_language/{language}',[DashboardController::class,'changeLanguage']);
    // Route::middleware('auth')->group(function(){
    Route::prefix('admin')->middleware("admin")->group(function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashbaord');
        Route::get('/categories',[CategoryController::class,'index'])->name('categories');
        Route::get('/categories/add',[CategoryController::class,'add']);
        Route::post('/categories/save',[CategoryController::class,'saveCategory']);
        Route::get('/categories/edit/{id}',[CategoryController::class,'edit']);
        Route::put('/categories/update',[CategoryController::class,'update']);
        Route::delete('/categories/delete/{id}',[CategoryController::class,'delete']);

        //Tag Route
        Route::get('/tags',[TagController::class,'index'])->name('tags');
        Route::get('/tags/add',[TagController::class,'add']);
        Route::post('/tags/save',[TagController::class,'save']);
        Route::delete('/tags/delete/{id}',[TagController::class,'delete']);
        Route::get('/tags/edit/{id}',[TagController::class,'edit']);
        Route::put('/tags/update',[TagController::class,'update']);

        Route::resource('sliders',SliderController::class);

      Route::controller(PostController::class)->group(function(){  
        Route::get('/posts','Posts')->name('posts');
        Route::get('/add_post','AddPost');
        Route::get('/edit_post','EditPost');
        Route::get('/delete_post','DeletePost');
      });


        Route::get('/profile',[UserController::class,'profile']);
        Route::post('/profile/save',[UserController::class,'profileSave']);
});


});

