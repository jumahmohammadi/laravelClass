@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Home Setting">
    <x-slot name="links">
        / <li>Home Setting</li>
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
                <h3 class="box-title">Home Setting</h3>
            </div>
            <div>
                <form action="{{URL::to('admin/setting/home/save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
					<div class="row align-items-center mb-4">
                        <div class="col-md-2">
                            <h4>First Section</h4>
                        </div>
                        <div class="col-md-5">
                             <label for="section1">Categories</label>
                             <select name="section1" id="section1" class="form-select">
                                <option value="">---</option>
                                @foreach($categories as $category)
                                   <option value="{{$category->id}}"  @if(isset($setting->home_section1) and $setting->home_section1==$category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                             </select>
                             @if($errors->has('section1'))
                                <span class="text-danger">{{$errors->first('section1')}}</span>
                                @endif
                                <input type="hidden" name="id" value="{{isset($setting->id)?$setting->id:''}}">
                        </div>
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-md-2">
                            <h4>Second Section</h4>
                        </div>
                        <div class="col-md-5">
                             <label for="section2">Categories</label>
                             <select name="section2" id="section2" class="form-select">
                                <option value="">---</option>
                                @foreach($categories as $category)
                                   <option value="{{$category->id}}" @if(isset($setting->home_section2) and $setting->home_section2==$category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                             </select>
                             @if($errors->has('section2'))
                                <span class="text-danger">{{$errors->first('section2')}}</span>
                                @endif
                        </div>
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-md-2">
                            <h4>Third Section</h4>
                        </div>
                        <div class="col-md-5">
                             <label for="section3">Categories</label>
                             <select name="section3" id="section3" class="form-select">
                                <option value="">---</option>
                                @foreach($categories as $category)
                                   <option value="{{$category->id}}" @if(isset($setting->home_section3) and $setting->home_section3==$category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                             </select>
                             @if($errors->has('section3'))
                                <span class="text-danger">{{$errors->first('section3')}}</span>
                                @endif
                        </div>
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-md-2">
                            <h4>Fourth Section</h4>
                        </div>
                        <div class="col-md-5">
                             <label for="section4">Categories</label>
                             <select name="section4" id="section4" class="form-select">
                                <option value="">---</option>
                                @foreach($categories as $category)
                                   <option value="{{$category->id}}" @if(isset($setting->home_section4) and $setting->home_section4==$category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                             </select>
                             @if($errors->has('section4'))
                                <span class="text-danger">{{$errors->first('section4')}}</span>
                                @endif
                        </div>
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