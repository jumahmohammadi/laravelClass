<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use Hash; 

class UserController extends Controller
{
    public function profile(){
		$user=Auth::user();
		//dd(Hash::make(12345));
		return view('admin.user.profile',['profile'=>$user]);
	}
	
	public function profileSave(Request $request){
		
	}
}
