<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Post;
class WebController extends Controller
{
  function home(){
    $slider=Slider::all();
    $section1_post=Post::with('category','author')->limit(5)->orderBy('id','DESC')->get();
    $section2_post=Post::limit(6)->orderBy('id','DESC')->get();
    return view('web.home',['sliders'=>$slider,'section1_post'=>$section1_post,'section2_post'=>$section2_post]);
  }

  function category(){

  }
  function singlePost(){
    
  }
}
