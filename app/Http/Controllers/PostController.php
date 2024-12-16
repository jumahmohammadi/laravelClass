<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\Category; 
use App\Models\User; 
use App\Models\Tag; 
use Auth; 
use Session;

class PostController extends Controller
{
   

    function index(Request $request){
        // $posts=Post::paginate(10);
       //$allPosts=Post::find(1);
	   //$post_author=$allPosts->author;
	   //$post_category=$allPosts->category;
	   //$post_category=$allPosts->tags;
	  
    //  $post=new Post();
    //  $posts=$post->getAllPost();   
  
      $title=$request->title;
      $date=$request->date;
      $category=$request->category;
      $user=$request->user;

       $categories=Category::all();
       $users=User::all();
       $posts=Post::getAllPost($title,$date,$category,$user);
       return view('admin.posts.index',['posts'=>$posts,'users'=>$users,'categories'=>$categories]);
    }

    function add(){
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.add',['categories'=>$categories,'tags'=>$tags]);
    }

    function save(Request $request){
      $request->validate([
        'title'=>'required',
        'photo'=>'required|max:1024|mimes:jpg,png,jpeg',
        'date'=>'required',
        'category'=>'required',
        'tags'=>'required',
        'detail'=>'required',
      ]);

      $post = new Post();
      $post->title=$request->title;
      $post->date=$request->date;
      $post->category_id=$request->category;
      $post->detail=$request->detail;
      $post->author_id=Auth::user()->id;
      if($request->photo){
       $post->photo= $request->file('photo')->store('posts');
      }
      
      $result=$post->save(); 
      if($result){
        $post->tags()->attach($request->tags);//async
        Session::flash('alert_message','Post inserted Successfully');
        Session::flash('alert_class','alert-success');
      }else{
        Session::flash('alert_message','Inert Faild!');
        Session::flash('alert_class','alert-danger');
      }

      return redirect('admin/posts');
      
    }

   function edit($id){
     $post=Post::find($id);
     $categories=Category::all();
     $tags=Tag::all();
    // dd($post->tags);
    
     return view('admin.posts.edit',['categories'=>$categories,'tags'=>$tags,'post'=>$post]);
   }


    public function update(Request $request,$post_id){
      $request->validate([
        'title'=>'required',
        'photo'=>'max:1024|mimes:jpg,png,jpeg',
        'date'=>'required',
        'category'=>'required',
        'tags'=>'required',
        'detail'=>'required',
      ]);
      
      $post =  Post::find($post_id);
      $post->title=$request->title;
      $post->date=$request->date;
      $post->category_id=$request->category;
      $post->detail=$request->detail;
     
      if($request->photo){
          $old_photo_address=public_path().'/uploads/'.$post->photo;
          if(file_exists($old_photo_address)){
            unlink($old_photo_address);
          }
          
          $post->photo= $request->file('photo')->store('posts');
      }
      
      $result=$post->save(); 
      if($result){
        $post->tags()->sync($request->tags);
        Session::flash('alert_message','Post Updated Successfully');
        Session::flash('alert_class','alert-success');
      }else{
        Session::flash('alert_message','Update Faild!');
        Session::flash('alert_class','alert-danger');
      }

      return redirect('admin/posts');
    }

    function delete($id){
        $post=Post::find($id);
        $old_photo_address=public_path().'/uploads/'.$post->photo;
        if(file_exists($old_photo_address)){
          unlink($old_photo_address);
        }
        $result=Post::destroy($id);
        $post->tags()->detach();

        if($result){
          Session::flash('alert_message','Post Delete Successfully');
          Session::flash('alert_class','alert-success');
        }else{
          Session::flash('alert_message','Inert Faild!');
          Session::flash('alert_class','alert-danger');
        }
  
        return redirect('admin/posts');
    }
}

