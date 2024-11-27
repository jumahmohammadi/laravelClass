@extends('layout.app')
@section('breadcrumb')
<x-breadcrumb pageTitle="Edit Tag">
    <x-slot name="links">
        / <li>Tags</li>
        / <li>Edit tag</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('mainContent')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="box-title">Edit Tag</h3>
            </div>
            <div>
                <form action="{{URL::to('admin/tags/update')}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="tag_name">Name</label>
                        <input type="text" name="tag_name" id="tag_name" class="form-control" value="{{$edit_tag->name}}">
                        <input type="hidden" name="id" value="{{$edit_tag->id}}">
                        @if($errors->has('tag_name'))
                            <span class="text-danger">{{$errors->first('tag_name')}}</span>
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