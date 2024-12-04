<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $table="tbl_categories";
	
	function posts(){
		return $this->hasMany(Post::class);
	}
	
	
}
