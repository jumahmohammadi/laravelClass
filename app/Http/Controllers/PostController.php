<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function allPosts(){
        echo "<h1>show all posts</h1>";
    }

    function singlePost(){
        echo "<h2>show single post</h2>";
    }
}

