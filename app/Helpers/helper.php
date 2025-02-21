<?php 
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

function setting(){
	return Setting::find(1);
}

function getAllCategoriesWithPostCount(){
	return Category::withCount('posts')->get();
}

function getMenuCategories(){
	return Category::where('show_in_menu',1)->get();
}

function recentPosts(){
   return Post::limit(4)->orderBy('id','DESC')->get();
}

function PopularPosts(){
	return Post::limit(4)->orderBy('views','DESC')->get();
 }

 function GetAllTags(){
    return Tag::all();
 }

?>