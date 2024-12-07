<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag; 

use Validator;
use Session;

class TagController extends Controller
{
  function index(){
    // $tags=Tag::all();
    // $tags=Tag::OrderBy('name','DESC')->get();
    // $tags=Tag::OrderBy('name','ASC')->get();
    // $tags=Tag::OrderBy('id','DESC')->limit(3)->get();
    // $tags=Tag::OrderBy('id','DESC')->limit(3)->offset(1)->get();
    $tags=Tag::OrderBy('id','DESC')->paginate(10);

    return view('admin.tag.index',['tags'=>$tags]);
  }

  function add(){
    return view('admin.tag.add');
  }

  function save(Request $request){

    $request->validate([
          'tag_name'=>'required|min:3|unique:tags,name',
          
    ],
    [
      'tag_name.required'=>'نام تگ الزامی است',
      'tag_name.min'=>'نام تگ باید حداقل 3 حرف باشد',
      'tag_name.unique'=>'اسم تگ  تکرار است',
    ]); 

    $tag=new Tag();
    $tag->name=$request->tag_name;

    if($tag->save()){
       Session::flash('alert_message','Tag Inserted Successfully');
       Session::flash('alert_class','alert-success');
    }else{
       Session::flash('alert_message','Inert Faild!');
       Session::flash('alert_class','alert-danger');
    }

    return redirect('admin/tags');
  }

  public function edit($tag_id){
     $tag=Tag::find($tag_id);
     return view('admin.tag.edit',['edit_tag'=>$tag]);
  }
 

  public function update(Request $request){
    $id=$request->id; 

    $request->validate([
      'tag_name'=>'required|min:3|unique:tags,name,'.$id,
      ],
      [
        'tag_name.required'=>'نام تگ الزامی است',
        'tag_name.min'=>'نام تگ باید حداقل 3 حرف باشد',
        'tag_name.unique'=>'اسم تگ  تکرار است',
      ]); 

      $tag=Tag::find($id);
      $tag->name=$request->tag_name;

       if($tag->save()){
        Session::flash('alert_message','Tag Updated Successfully');
        Session::flash('alert_class','alert-success');
       }else{
        Session::flash('alert_message','Update Faild!');
        Session::flash('alert_class','alert-danger');
       }

       return redirect('admin/tags');
  }


  public function delete($tag_id){
    if(Tag::destroy($tag_id)){
      Session::flash('alert_message','Tag Deleted Successfully');
       Session::flash('alert_class','alert-success');
    }else{
      Session::flash('alert_message','Delete Faild');
      Session::flash('alert_class','alert-danger');
    }

    return redirect('admin/tags');
  }
}
