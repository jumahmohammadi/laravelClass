<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function signupform(){
        return view('users.registeration.add_user');
    }
}
