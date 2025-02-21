<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
class SettingController extends Controller
{
    function index()
    {
        $setting = Setting::find(1);
        return view('admin.setting.index', ['setting' => $setting,'page_title'=>'Setting']);
    }

    function save(Request $request){
	    $url_regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';	
        $request->validate([
			'title' => 'required|min:3',
			'email' => 'required|email',
			'phone' => 'required',
			'address' => 'required',
			'detail' => 'required',
			'logo' => 'max:1024|mimes:jpg,jpeg,png,svg',
			'facebook_link'=> 'regex:' . $url_regex,
			'twitter_link'=> 'regex:' . $url_regex,
			'instagram_link'=> 'regex:' . $url_regex,
			'youtube_link'=> 'regex:' . $url_regex,
		
		]);

        if($request->id){
            $setting = Setting::find(1);
        }else{
            $setting= new Setting();
            $setting->id=1;
        }

        
		$setting->title = $request->title;
		$setting->email = $request->email;
		$setting->address = $request->address;
		$setting->phone = $request->phone;
		$setting->detail = $request->detail;
		$setting->facebook_link = $request->facebook_link;
		$setting->twitter_link = $request->twitter_link;
		$setting->instagram_link = $request->instagram_link;
		$setting->youtube_link = $request->youtube_link;

		
        if ($request->logo ) {
            if($request->id){
                $old_photo_address = public_path() . '/uploads/' . $setting->logo;
                if (file_exists($old_photo_address)) {
                    unlink($old_photo_address);
                }
          }

            $photo_address = $request->file('logo')->store('setting');
            $setting->logo = $photo_address;
        }

		

		if ($setting->save()) {
			Session::flash('alert_message', 'Setting Update Successfully');
			Session::flash('alert_class', 'alert-success');
		} else {
			Session::flash('alert_message', 'Update Faild!');
			Session::flash('alert_class', 'alert-danger');
		}

		return redirect('admin/setting');
	}

	function home(){
       $categories=Category::all();
	   $setting = Setting::find(1);
        return view('admin.setting.home', ['setting' => $setting,'categories'=>$categories,'page_title'=>'Home Setting']);

	}

	function homeSave(Request $request){
        // $request->validate([
		// 	'section1'=>'required',
		// 	'section2'=>'required',
		// 	'section3'=>'required',
		// 	'section4'=>'required',
		// ]);
		
		if($request->id){
			$setting=Setting::find(1);
		}else{
			$setting=new Setting();
			$setting->id=1;
		}

		$setting->home_section1=$request->section1;
		$setting->home_section2=$request->section2;
		$setting->home_section3=$request->section3;
		$setting->home_section4=$request->section4;

		if($setting->save()){
			Session::flash('alert_message', 'Setting Update Successfully');
			Session::flash('alert_class', 'alert-success');
		}else{
			Session::flash('alert_message', 'Update Faild!');
			Session::flash('alert_class', 'alert-danger');
		}
		return back();
	}
    
}