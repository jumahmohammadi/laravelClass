<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	function posts(){
		return $this->belongsToMany(Post::class);
	}
}
