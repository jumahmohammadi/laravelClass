<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category; 

use Validator;
use Session;

class CategoryController extends Controller
{
  function index(){
    $categories=Category::all();

    // $singleCategory=Category::find(5);
    //dd($singleCategory->posts);

    // Session::put('username','Ahmad');
    // echo Session::get('username');
    // Session::pull('username');

    
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

    if($category->save()){
       Session::flash('alert_message',__('labels.category_inserted_successfully'));
       Session::flash('alert_class','alert-success');
    }else{
       Session::flash('alert_message','Inert Faild!');
       Session::flash('alert_class','alert-danger');
    }

    return redirect('admin/categories');
    // return back();
  }

  public function edit($category_id){
    $category=Category::find($category_id);
    
    return view('admin.category.edit',['category'=>$category]);
  }

  public function update(Request $request){
    $id=$request->id;
    $request->validate([
      'cname'=>'required|min:3|max:20|unique:categories,name,'.$id,
      'cdescription'=>'required',
      ],
      [
        'cname.required'=>'Category Name is Required',
        'cname.min'=>'Category Name must be more than 3 characters',
        'cname.max'=>'Category Name must be less than 20 characters',
        'cname.unique'=>'اسم کتگوری تکرار است',
        'cdescription.required'=>'توضیجات کتگوری الزامی است',
      ]);  

      
      $category=Category::find($id);
      $category->name=$request->cname;
      $category->description=$request->cdescription;
      if($category->save()){
        Session::flash('alert_message','Category Updated Successfully');
       Session::flash('alert_class','alert-success');
      }else{
        Session::flash('alert_message','Update Faild!');
        Session::flash('alert_class','alert-danger');
      }

      
      return redirect('admin/categories');
  }

  public function delete($category_id){
    if(Category::destroy($category_id)){
      Session::flash('alert_message','Category Deleted Successfully');
       Session::flash('alert_class','alert-success');
    }else{
      Session::flash('alert_message','Delete Faild');
      Session::flash('alert_class','alert-danger');
    }

    return redirect('admin/categories');
  }
}
