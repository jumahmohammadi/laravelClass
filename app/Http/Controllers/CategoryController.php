<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category; 

class CategoryController extends Controller
{
    //
    public function allCategory(){
           $allcategory=Category::all();
           
           return view('categories',['all_categories'=>$allcategory]);
    }
}
