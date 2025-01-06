<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use App\Models\Comment;
class WebController extends Controller
{
  function home(){
    $active_page="home";
    $slider=Slider::all();
    $setting=Setting::find(2);
    if(isset($setting)){
      $section1_post=Post::with('category','author')->where('category_id',$setting->home_section1)->limit(5)->orderBy('id','DESC')->get();
      $section2_post=Post::with('category','author')->where('category_id',$setting->home_section2)->limit(6)->orderBy('id','DESC')->get();
      $section3_post=Post::with('category','author')->where('category_id',$setting->home_section3)->limit(5)->orderBy('id','DESC')->get();
      $section4_post=Post::with('category','author')->where('category_id',$setting->home_section4)->limit(5)->orderBy('id','DESC')->get();
    }else{
      $section1_post=Post::with('category','author')->limit(5)->orderBy('id','DESC')->get();
      $section2_post=Post::with('category','author')->limit(6)->orderBy('id','DESC')->get();
      $section3_post=Post::with('category','author')->limit(5)->orderBy('id','DESC')->get();
      $section4_post=Post::with('category','author')->limit(5)->orderBy('id','DESC')->get();
    }

    return view('web.home',['sliders'=>$slider,'section1_post'=>$section1_post,'section2_post'=>$section2_post,'section3_post'=>$section3_post,'section4_post'=>$section4_post,'active_page'=>$active_page]);
  }

  function category($category){
    $active_page=$category;
    $category_id=Category::where('name',$category)->first()->id;
     
     $posts=Post::with('category','author')->where('category_id',$category_id)->paginate(10);   
     return view('web.category',['posts'=>$posts,'category_name'=>$category,'active_page'=>$active_page]);
  }

  function author($id){
    $user=User::find($id);
    $author_name=$user->name.' '.$user->last_name; 
    $posts=Post::with('category','author')->where('author_id',$id)->paginate(10);   
    return view('web.author',['posts'=>$posts,'author_name'=>$author_name]);
 }

 function search(Request $request){
  $word=$request->word; 
  $posts=Post::with('category','author')->where('title','like',"%".$word."%")->orWhere('detail','like',"%".$word."%")->paginate(10);   
    return view('web.search',['posts'=>$posts,'word'=>$word]);
 }


  function singlePost($id){
    Post::where('id',$id)->increment('views',1);
    $post=Post::find($id);

    // $comments=$post->comments()->where('parent_id',null)->orderBy('id','DESC')->get();
    $comments=Comment::with('replies')->where('parent_id',null)->where('post_id',$id)->orderBy('id','DESC')->get();
    return view('web.single',['post'=>$post,'comments'=>$comments]); 
  }
}
