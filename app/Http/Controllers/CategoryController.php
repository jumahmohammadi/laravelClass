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

  function add(){
    return view('admin.category.add');
  }

  function save(Request $request){
    // dd($request->cname);
    $category=new Category();
    $category->name=$request->cname;
    $category->description=$request->cdescription;

    $category->save();

    return redirect('admin/categories');
    // return back();
  }
}
