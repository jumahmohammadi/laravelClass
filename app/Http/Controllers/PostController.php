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

    function AddPost(){
        echo "<h1>Post added successfulty</h1>";
    }

    function EditPost(){
        echo "<h1>Post updated successfulty</h1>";
    }

    function DeletePost(){
        echo "<h1>Post deleted successfulty</h1>";
    }
}

