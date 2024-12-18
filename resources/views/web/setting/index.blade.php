@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Setting">
    <x-slot name="links">
        / <li>Setting</li>
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
                <h3 class="box-title">Setting</h3>
            </div>
            <div>
                <form action="{{URL::to('admin/profile/save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{isset($setting->title) ? $setting->title : ''}}">
                        @if($errors->has('title'))
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="detail">Detail</label>
                        <textarea name="detail" id="detail" class="form-control"
                            rows="3">{{isset($setting->detail) ? $setting->detail : ''}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="photo">Logo</label> @if(isset($setting->logo)) <img
                            src="{{asset('uploads/' . $setting->logo)}}" style="width:80px"> @endif
                        <input type="file" name="logo" id="logo" class="form-control">
                        @if($errors->has('logo'))
                        <span class="text-danger">{{$errors->first('logo')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control"
                            rows="3">{{isset($setting->address) ? $setting->address : ''}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            value="{{isset($setting->phone) ? $setting->phone : ''}}">
                        @if($errors->has('phone'))
                        <span class="text-danger">{{$errors->first('phone')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{isset($setting->email) ? $setting->email : ''}}">
                        @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="facebook_link">Facebook</label>
                        <input type="text" name="facebook_link" id="facebook_link" class="form-control"
                            value="{{isset($setting->facebook_link) ? $setting->facebook_link : ''}}">
                        @if($errors->has('facebook_link'))
                        <span class="text-danger">{{$errors->first('facebook_link')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="twitter_link">Twitter</label>
                        <input type="text" name="twitter_link" id="twitter_link" class="form-control"
                            value="{{isset($setting->twitter_link) ? $setting->twitter_link : ''}}">
                        @if($errors->has('twitter_link'))
                        <span class="text-danger">{{$errors->first('twitter_link')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="instagram_link">Instagram</label>
                        <input type="text" name="instagram_link" id="instagram_link" class="form-control"
                            value="{{isset($setting->instagram_link) ? $setting->instagram_link : ''}}">
                        @if($errors->has('instagram_link'))
                        <span class="text-danger">{{$errors->first('instagram_link')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="youtube_link">Youtube</label>
                        <input type="text" name="youtube_link" id="youtube_link" class="form-control"
                            value="{{isset($setting->youtube_link) ? $setting->youtube_link : ''}}">
                        @if($errors->has('youtube_link'))
                        <span class="text-danger">{{$errors->first('youtube_link')}}</span>
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