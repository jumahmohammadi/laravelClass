<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    function post(){
        return $this->belongsTo(Post::class);
    }

    function replies(){
        return $this->hasMany(Comment::class,"parent_id");
    }
}
