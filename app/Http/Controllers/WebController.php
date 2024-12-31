<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;
class WebController extends Controller
{
  function home(){
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

    return view('web.home',['sliders'=>$slider,'section1_post'=>$section1_post,'section2_post'=>$section2_post,'section3_post'=>$section3_post,'section4_post'=>$section4_post]);
  }

  function category($category){
     $category_id=Category::where('name',$category)->first()->id;
     $posts=Post::with('category','author')->where('category_id',$category_id)->get();   
     return view('web.category',['posts'=>$category->posts]);
  }

  function author($id){
    $posts=Post::with('category','author')->where('author_id',$id)->get();   
    return view('web.category',['posts'=>$category->posts]);
 }


  function singlePost($id){
    Post::where('id',$id)->increment('views',1);
    $post=Post::find($id);

    return view('web.single',['post'=>$post]); 
  }
}
