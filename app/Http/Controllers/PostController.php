<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class PostController extends Controller
{
   

    function Posts(){
        $allPosts=Post::all();
       return view('admin.posts.index',['page_title'=>'All Posts','posts'=>$allPosts]);
    }

}

