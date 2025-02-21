<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;

use App\Models\User;

class UserController extends Controller
{
	public function profile()
	{
		$user = Auth::user();
		//dd(Hash::make(12345));
		return view('admin.user.profile', ['profile' => $user,'page_title'=>'Profile']);
	}

	public function profileSave(Request $request)
	{
		$url_regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

		$request->validate([
			'name' => 'required|min:3',
			'last_name' => 'required|min:3',
			'email' => 'required|email',
			'detail' => 'required',
			'photo' => 'max:1024|mimes:jpg,jpeg,png',
			'current_password' => 'nullable|min:5|current_password',
			'password' => 'nullable|min:5',
			'password_confirmation' => 'nullable|min:5|same:password',
			'facebook_link'=> 'regex:' . $url_regex,
			'twitter_link'=> 'regex:' . $url_regex,
			'instagram_link'=> 'regex:' . $url_regex,
		]);

		$user_id = Auth::user()->id;
		$user = User::find($user_id);

		$user->name = $request->name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->detail = $request->detail;
		$user->facebook_link = $request->facebook_link;
		$user->twitter_link = $request->twitter_link;
		$user->instagram_link = $request->instagram_link;

		if ($request->password) {
			$user->password = Hash::make($request->password);
		}
		if ($request->photo) {
			$old_photo_address = public_path() . '/uploads/' . $user->photo;
			if (file_exists($old_photo_address)) {
				unlink($old_photo_address);
			}

			$photo_address = $request->file('photo')->store('users');
			$user->photo = $photo_address;
		}

		if ($user->save()) {
			Session::flash('alert_message', 'Profile Update Successfully');
			Session::flash('alert_class', 'alert-success');
		} else {
			Session::flash('alert_message', 'Update Faild!');
			Session::flash('alert_class', 'alert-danger');
		}

		return redirect('admin/profile');
	}
}