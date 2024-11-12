<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class PostController extends Controller
{
    function allPosts(){
        echo "<h1>show all posts</h1>";
    }

    function singlePost(){
        echo "<h2>show single post</h2>";
    }

    function showAllPosts(){
        $allPosts=Post::all();
        // $singlePost=Post::find(1);
        // dd($singlePost);
       return view('posts',['page_title'=>'All Posts','posts'=>$allPosts]);
    }

    function layout(){
        return view('layout.app');
    }
}

