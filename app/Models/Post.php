<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    // protected $table="tbl_posts";
    
	function category(){
		return $this->belongsTo(Category::class);
	}
	
	function author(){
		return $this->belongsTo(User::class);
	}
	
	function tags(){
		return $this->belongsToMany(Tag::class);
	}
	
}
