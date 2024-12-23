<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Post;
class WebController extends Controller
{
  function home(){
    $slider=Slider::all();
    $posts=Post::all();
    return view('web.home',['sliders'=>$slider,'posts'=>$posts]);
  }

  function category(){

  }
  function singlePost(){
    
  }
}
