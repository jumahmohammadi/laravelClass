<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session; 

class DashboardController extends Controller
{
 function index(){
    return view('admin.dashboard');
 }

 public function changeLanguage($lang){
    Session::put('selected_language',$lang);
   
    return back();
 }
}
