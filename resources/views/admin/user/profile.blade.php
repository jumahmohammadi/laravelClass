@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Profile">
    <x-slot name="links">
        / <li>Profile</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('mainContent')
@if(Session::has('alert_message'))
<x-message text="{{Session::get('alert_message')}}" cls="{{Session::get('alert_class')}}"></x-message>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="box-title">Profile</h3>
            </div>
            <div>
                <form action="{{URL::to('admin/profile/save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$profile->name}}">
                        @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                            value="{{$profile->last_name}}">
                        @if($errors->has('last_name'))
                        <span class="text-danger">{{$errors->first('last_name')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$profile->email}}">
                        @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="photo">Photo</label> @if($profile->photo) <img
                            src="{{asset('uploads/' . $profile->photo)}}" style="width:80px"> @endif
                        <input type="file" name="photo" id="photo" class="form-control">
                        @if($errors->has('photo'))
                        <span class="text-danger">{{$errors->first('photo')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="detail">Detail</label>
                        <textarea name="detail" id="detail" class="form-control"
                            rows="3">{{$profile->detail}}</textarea>
                            @if($errors->has('detail'))
                            <span class="text-danger">{{$errors->first('detail')}}</span>
                            @endif    
                    </div>

                    <div class="mb-3">
                        <label for="facebook_link">Facebook</label>
                        <input type="text" name="facebook_link" id="facebook_link" class="form-control"
                            value="{{$profile->facebook_link}}">
                        @if($errors->has('facebook_link'))
                        <span class="text-danger">{{$errors->first('facebook_link')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="twitter_link">Twitter</label>
                        <input type="text" name="twitter_link" id="twitter_link" class="form-control"
                            value="{{$profile->twitter_link}}">
                        @if($errors->has('twitter_link'))
                        <span class="text-danger">{{$errors->first('twitter_link')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="instagram_link">Instagram</label>
                        <input type="text" name="instagram_link" id="instagram_link" class="form-control"
                            value="{{$profile->instagram_link}}">
                        @if($errors->has('instagram_link'))
                        <span class="text-danger">{{$errors->first('instagram_link')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control">
                        @if($errors->has('current_password'))
                        <span class="text-danger">{{$errors->first('current_password')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation">Password Confirm</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control">
                        @if($errors->has('password_confirmation'))
                        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                        @endif
                    </div>



                    <div class="mb-3">
                        <button class="btn btn-primary btn-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection