<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Session; 
class CommentController extends Controller
{
    //

    function save(Request $request){
        $request->validate([
           'name'=>'required', 
           'email'=>'required', 
           'comment'=>'required', 
        ]);

        $post_id=$request->post_id;
        $comment=new Comment();
        $comment->post_id=$post_id;
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->website=$request->website;
        $comment->comment=$request->comment;
        if(!$comment->save()){
           Session::flash('comment_error','Comment not saved');
         }

        return redirect("/blog/single/$post_id#comment_section");
    }
}
