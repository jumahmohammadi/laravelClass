<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index()
    {
        $setting = Setting::find(1);
        return view('web.setting.index', ['setting' => $setting]);
    }
}