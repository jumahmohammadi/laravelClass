@extends('layout.app')
@section('breadcrumb')
<x-breadcrumb pageTitle="Edit Slide">
    <x-slot name="links">
        / <li>Sliders</li>
        / <li>Edit Slide</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('mainContent')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="box-title">Edit Slide</h3>
            </div>
            <div>
                <form action="{{URL::to('admin/sliders/'.$slider->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$slider->title}}">
                  
                        @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="detail">Detail</label>
                        <textarea  name="detail" id="detail" class="form-control">{{$slider->detail}}</textarea>
                        @if($errors->has('detail'))
                            <span class="text-danger">{{$errors->first('detail')}}</span>
                        @endif
                    </div>
					 <div class="mb-3">
                        <label for="photo">Photo</label> <img src="{{asset('/uploads/'.$slider->photo)}}" alt="" style="width:50px">
                        <input type="file" name="photo" id="photo" class="form-control" >
                        @if($errors->has('photo'))
                            <span class="text-danger">{{$errors->first('photo')}}</span>
                        @endif
                    </div>


                    
                    <div class="mb-3">
                        <button class="btn btn-primary btn-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>            
@endsection