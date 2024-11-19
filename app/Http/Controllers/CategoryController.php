<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category; 

class CategoryController extends Controller
{
  function index(){
    $categories=Category::all();
    return view('admin.category.index',['category'=>$categories]);
  }
}
