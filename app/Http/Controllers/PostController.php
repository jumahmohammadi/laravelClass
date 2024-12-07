<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\Category; 
use App\Models\Tag; 

class PostController extends Controller
{
   

    function index(){
        $posts=Post::paginate(10);
       //$allPosts=Post::find(1);
	   //$post_author=$allPosts->author;
	   //$post_category=$allPosts->category;
	   //$post_category=$allPosts->tags;
	   
       return view('admin.posts.index',['posts'=>$posts]);
    }

    function add(){
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.add',['categories'=>$categories,'tags'=>$tags]);
    }

    function EditPost(){
        echo "<h1>Post updated successfulty</h1>";
    }

    function DeletePost(){
        echo "<h1>Post deleted successfulty</h1>";
    }
}

