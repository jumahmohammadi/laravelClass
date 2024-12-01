@extends('layout.app')
@section('breadcrumb')
<x-breadcrumb pageTitle="Add Slide">
    <x-slot name="links">
        / <li>Sliders</li>
        / <li>Add Slide</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('mainContent')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="box-title">Add Slide</h3>
            </div>
            <div>
                <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                        @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                    </div>
					
					   <div class="mb-3">
                        <label for="detail">Detail</label>
                        <textarea  name="detail" id="detail" class="form-control">{{old('detail')}}</textarea>
                        @if($errors->has('detail'))
                            <span class="text-danger">{{$errors->first('detail')}}</span>
                        @endif
                    </div>
					 <div class="mb-3">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" >
                        @if($errors->has('photo'))
                            <span class="text-danger">{{$errors->first('photo')}}</span>
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