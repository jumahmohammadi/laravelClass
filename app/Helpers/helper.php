<?php 
use App\Models\Setting;
use App\Models\Category;

function setting(){
	return Setting::find(1);
}

function getAllCategoriesWithPostCount(){
	return Category::withCount('posts')->get();
}

function getMenuCategories(){
	return Category::where('show_in_menu',1)->get();
}

?>