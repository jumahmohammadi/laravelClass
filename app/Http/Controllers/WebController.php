<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Post;
use App\Models\Setting;
class WebController extends Controller
{
  function home(){
    $slider=Slider::all();
    $setting=Setting::find(1);
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

    return view('web.home',['sliders'=>$slider,'section1_post'=>$section1_post,'section2_post'=>$section2_post]);
  }

  function category(){

  }
  function singlePost(){
    
  }
}
