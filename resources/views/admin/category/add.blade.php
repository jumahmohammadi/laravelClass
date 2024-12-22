@extends('layout.app')
@section('breadcrumb')
<x-breadcrumb pageTitle="Add Category">
    <x-slot name="links">
        / <li>Categories</li>
        / <li>Add Category</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('mainContent')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="box-title">Add Category</h3>
            </div>
            <div>
                <form action="{{URL::to('admin/categories/save')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="cname" id="name" class="form-control" value="{{old('cname')}}">
                        @if($errors->has('cname'))
                            <span class="text-danger">{{$errors->first('cname')}}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="cdescription" id="description" class="form-control" rows="5">{{old('cdescription')}}</textarea>
                        @if($errors->has('cdescription'))
                        <span class="text-danger">{{$errors->first('cdescription')}}</span>
                    @endif
                    </div>
                    <div class="mb-3">
                        <label for="show_in_menu">Show In Menu?</label>
                        <input type="checkbox" name="show_in_menu" id="show_in_menu" class="">
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