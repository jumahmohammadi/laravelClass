<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB; 
class Post extends Model
{
	protected $appends = ['image_url'];
    function getImageUrlAttribute(){
        return asset('uploads/'.$this->photo);
    }
	
    // protected $table="tbl_posts";
   public static function getAllPost($title,$date,$category,$user){
    //  $posts =  DB::table('posts as p')
    //           ->leftjoin('categories as c','c.id','p.category_id')
    //           ->leftjoin('users as u','u.id','p.author_id');
			 
    //           if($category){
	// 			$posts=$posts->where('p.category_id',$category);
	// 		  }
	// 		  if($user){
	// 			$posts=$posts->where('p.author_id',$user);
	// 		  }
	// 		  if($date){
	// 			$posts=$posts->whereDate('p.date',$date);
	// 		  }
	// 		  if($title){
	// 			$posts=$posts->where('p.title','like',"%".$title."%");
	// 		  }

	// 		  return $posts->select('p.*','u.name as authorName','u.last_name as authorLastName','c.name as categoryName')->orderBy('id','DESC')->paginate();
	

	$posts =  DB::table('posts as p')
              ->leftjoin('categories as c','c.id','p.category_id')
              ->leftjoin('users as u','u.id','p.author_id')
			  ->when($category,function($query) use($category){
				$query->where('p.category_id',$category); 
			  })
			  ->when($user,function($query) use($user){
				$query->where('p.author_id',$user); 
			  })
			  ->when($date,function($query) use($date){
				$query->whereDate('p.date',$date); 
			  })
			  ->when($title,function($query) use($title){
				$query->where('p.title','like',"%".$title."%"); 
			  })
			  ->select('p.*','u.name as authorName','u.last_name as authorLastName','c.name as categoryName')->orderBy('id','DESC')->paginate(10);

       return $posts; 
   }

	function category(){
		return $this->belongsTo(Category::class);
	}
	
	function author(){
		return $this->belongsTo(User::class);
	}
	
	function tags(){
		return $this->belongsToMany(Tag::class);
	}
	
	function comments(){
		return $this->hasMany(Comment::class);
	}

	
}
