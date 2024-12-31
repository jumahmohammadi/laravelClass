<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WebController;

Route::middleware('lang')->group(function () {
  Route::get('/', [WebController::class,'home']);
  Route::get('/blog/single/{id}', [WebController::class,'singlePost']);
  Route::get('/category/{category}', [WebController::class,'category']);
  Route::get('/change_language/{language}', [DashboardController::class, 'changeLanguage']);
  // Route::middleware('auth')->group(function(){
  Route::prefix('admin')->middleware("admin")->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashbaord');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/add', [CategoryController::class, 'add']);
    Route::post('/categories/save', [CategoryController::class, 'saveCategory']);
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
    Route::put('/categories/update', [CategoryController::class, 'update']);
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'delete']);

    //Tag Route
    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/tags/add', [TagController::class, 'add']);
    Route::post('/tags/save', [TagController::class, 'save']);
    Route::delete('/tags/delete/{id}', [TagController::class, 'delete']);
    Route::get('/tags/edit/{id}', [TagController::class, 'edit']);
    Route::put('/tags/update', [TagController::class, 'update']);

    Route::resource('sliders', SliderController::class);

    Route::controller(PostController::class)->group(function () {
      Route::get('/posts', 'index')->name('posts');
      Route::get('/posts/add', 'add');
      Route::post('/posts/save', 'save');
      Route::get('/posts/edit/{id}', 'edit');
      Route::put('/posts/update/{id}', 'update');
      Route::delete('/posts/delete/{id}', 'delete');
    });


    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile/save', [UserController::class, 'profileSave']);

    Route::get('/setting', [SettingController::class, 'index']);
    Route::put('/setting/save', [SettingController::class, 'save']);
    
    
    Route::get('/setting/home', [SettingController::class, 'home']);
    Route::put('/setting/home/save', [SettingController::class, 'homeSave']);
  });


});