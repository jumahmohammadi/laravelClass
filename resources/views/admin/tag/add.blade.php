@extends('layout.app')
@section('breadcrumb')
<x-breadcrumb pageTitle="Add Tag">
    <x-slot name="links">
        / <li>Tags</li>
        / <li>Add tag</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('mainContent')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="box-title">Add Tag</h3>
            </div>
            <div>
                <form action="{{URL::to('admin/tags/save')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="tag_name">Name</label>
                        <input type="text" name="tag_name" id="tag_name" class="form-control" value="{{old('tag_name')}}">
                        @if($errors->has('tag_name'))
                            <span class="text-danger">{{$errors->first('tag_name')}}</span>
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