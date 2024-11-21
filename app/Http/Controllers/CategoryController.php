<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category; 

use Validator;

class CategoryController extends Controller
{
  function index(){
    $categories=Category::all();
    return view('admin.category.index',['category'=>$categories]);
  }

  function add(){
    return view('admin.category.add');
  }

  function saveCategory(Request $request){

  //  $validations= Validator::make(
  //     $request->all(),
  //      [
  //       'cname'=>'required|min:3|max:10|unique:categories,name',
  //         'cdescription'=>'required',
  //      ],
  //      [
  //         'cname.required'=>'Category Name is Required',
  //         'cname.min'=>'Category Name must be more than 3 characters',
  //         'cname.max'=>'Category Name must be less than 10 characters',
  //         'cname.unique'=>'اسم کتگوری تکرار است',
  //         'cdescription.required'=>'توضیجات کتگوری الزامی است',
  //       ]
  //   );
    
  //   if($validations->fails()){
  //     return $validations->errors();
  //   }else{

  //   }

    $request->validate([
          'cname'=>'required|min:3|max:10|unique:categories,name',
          'cdescription'=>'required',
    ],
    [
      'cname.required'=>'Category Name is Required',
      'cname.min'=>'Category Name must be more than 3 characters',
      'cname.max'=>'Category Name must be less than 10 characters',
      'cname.unique'=>'اسم کتگوری تکرار است',
      'cdescription.required'=>'توضیجات کتگوری الزامی است',
    ]); 

    $category=new Category();
    $category->name=$request->cname;
    $category->description=$request->cdescription;

    $category->save();

    return redirect('admin/categories');
    // return back();
  }
}
