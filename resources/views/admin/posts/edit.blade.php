@extends('layout.app')
@section('breadcrumb')
<x-breadcrumb pageTitle="Edit Tag">
    <x-slot name="links">
        / <li>Tags</li>
        / <li>Edit Post</li>
    </x-slot>
</x-breadcrumb>
@endsection

@section('mainContent')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="box-title">Edit Post</h3>
            </div>
            <div>
                <form action="{{URL::to('admin/posts/update/'.$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                      
                        @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                    </div>
                    <div class="row mb-3">
                       <div class="col-md-6">
                        <label for="date">Date</label>
                            <input type="text" name="date" id="date" class="form-control input_date"  autocomplete="off" value="{{$post->date}}">
                            @if($errors->has('date'))
                                <span class="text-danger">{{$errors->first('date')}}</span>
                            @endif
                       </div>

                       <div class="col-md-6">
                        <label for="photo">Photo</label> 
                            <input type="file" name="photo" id="photo" class="form-control" >
                            @if($errors->has('photo'))
                                <span class="text-danger">{{$errors->first('photo')}}</span>
                            @endif
                            <img src="{{asset('uploads/'.$post->photo)}}" style="width:70px" alt="">
                       </div>
                    </div>

                    <div class="row mb-3">
                       <div class="col-md-6">
                        <label for="category">Category</label>
                            <select  name="category" id="category" class="form-select select2_dropdown">
                              <option value="">---</option> 
                                @foreach($categories as $category)
                                     <option value="{{$category->id}}" @if($category->id==$post->category_id)  selected @endif>{{$category->name}}</option>   
                                 @endforeach
                           </select>    
                            @if($errors->has('category'))
                                <span class="text-danger">{{$errors->first('category')}}</span>
                            @endif
                       </div>

                       <div class="col-md-6">
                        <label for="tags">Tags</label>
                            <select type="file" name="tags[]" id="tags" class="form-select select2_dropdown" multiple>
                                 @foreach($tags as $tag)
                                   
                                   <?php 
                                    $selected=false;
                                    foreach($post->tags as $post_tag):
                                       if($post_tag->id==$tag->id){
                                          $selected=true; 
                                       }   
                                    endforeach; 
                                    ?>

                                     <option value="{{$tag->id}}" @if($selected) selected @endif>{{$tag->name}}</option>   
                                 
                                 @endforeach
                            </select>  
                            @if($errors->has('tags'))
                                <span class="text-danger">{{$errors->first('tags')}}</span>
                            @endif
                       </div>
                    </div>

                    <div class="mb-3">
                            <label for="detail">Detail</label>
                            <textarea name="detail" id="detail" class="form-control rich_text_editor" rows="15">{{$post->detail}}</textarea>
                            @if($errors->has('detail'))
                                <span class="text-danger">{{$errors->first('detail')}}</span>
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
@section('internal_css')

<link rel="stylesheet" href="{{asset('css/select2.css')}}">
<link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
<link rel="stylesheet" href="{{asset('css/rte_theme_default.css')}}">
<style>
    .select2-selection--single,.select2-selection--multiple{
        padding: 5px;
        height: 38px !important;
    }
</style>
@endsection

@section('internal_javascript')
<script src="{{asset('js/select2.js')}}"></script>
<script src="{{asset('js/datepicker.js')}}"></script>
<script src="{{asset('js/rte.js')}}"></script>
<script src="{{asset('js/all_plugins.js')}}"></script>
<script>
    $(document).ready(function(){
        $(".select2_dropdown").select2();
        $(".input_date").datepicker({
            format: 'yyyy-mm-dd',
        });

        var editor1 = new RichTextEditor(".rich_text_editor");

    })
</script>
@endsection