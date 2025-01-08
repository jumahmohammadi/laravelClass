<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;

class ApiController extends Controller
{
   function sliders(){
    $sliders=Slider::all();   
   
    return response()->json([
        'status'=>200,
        'sliders'=>$sliders
     ]);
   }

   function postsByCategory($category,$limit=false){
      $category_id=Category::where('name',$category)->first()->id;
      $posts=Post::with('category','author')->where('category_id',$category_id)
      ->when($limit,function($query) use($limit){
        return $query->limit($limit);
      })->get();

      return response()->json([
         'status'=>200,
         'posts'=>$posts
      ]);

   }

   public function recentPost($limit=0){
      $posts=Post::with('category','author')
      ->when($limit,function($query) use($limit){
        return $query->limit($limit);
      })->orderBy('id','DESC')->get();

      return response()->json([
         'status'=>200,
         'posts'=>$posts
      ]);
   }

   function popularPost($limit=0){
      $posts=Post::with('category','author')
      ->when($limit,function($query) use($limit){
        return $query->limit($limit);
      })->orderBy('views','DESC')->get();

      return response()->json([
         'status'=>200,
         'posts'=>$posts
      ]);
   }

   function setting(){
      $setting= Setting::find(1);
      return response()->json([
         'status'=>200,
         'setting'=>$setting
      ]);
   }

   function SinglePost($id){
         $post=Post::find($id);   
         
         return response()->json([
         'status'=>200,
         'post'=>$post
      ]);
   }

   function saveComment(Request $request){
        
     $validations= Validator::make(
        $request->all(),
         [
          'post_id'=>'required',
          'name'=>'required|min:3',
          'email'=>'required',
          'comment'=>'required',
         ],[
            'post_id.required'=>'آی دی پست الزامی است',
            'name.required'=>'اسم الزامی است',
            'name.min'=>'اسم باید حداقل 3 حرف داشته باشد'

         ]
      );

      if($validations->fails()){
        return $validations->errors();
      }else{

        $comment=new Comment();
        $comment->post_id=$request->post_id;
        $comment->parent_id=$request->parent_id;
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->website=$request->website;
        $comment->comment=$request->comment;

        if($comment->save()){
           $status=201;
           $returnComment=$comment;
         }else{
            $status=400;  
            $returnComment='error ocured!'; 
         }

         return response()->json([
            'status'=>$status,
            'comment'=>$returnComment
      ]);
    }  


   }
}
