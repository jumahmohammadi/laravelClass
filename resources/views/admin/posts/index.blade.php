@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Posts">
  <x-slot name="links">
      / <li>Posts</li>
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
                                <h3 class="box-title">All Posts </h3>
                                <a href="{{URL::to('admin/posts/add')}}" class="btn btn-outline-primary">New Post</a>
                            </div>
                             <?php
                         
                         
                                // $searched_title=isset($_GET['title']) ? $_GET['title']:"";    
                                $searched_title=Request::input('title');    
                                $searched_date=isset($_GET['date']) ? $_GET['date']:"";    
                                $searched_category=isset($_GET['category']) ? $_GET['category']:"";     
                                $searched_user=isset($_GET['user']) ? $_GET['user']:"";     
                           
                             ?>
                            <div class="search">
                                <form action="{{Route('posts')}}" method="get">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" autocomplete="off" value="{{$searched_title}}">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="date">Date</label>
                                        <input type="text" class="form-control input_date" name="date" id="date" autocomplete="off" value="{{$searched_date}}">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="category">Category</label>
                                        <select name="category" class="form-select select2_dropdown" id="category">
                                            <option value="">----</option>
                                            @foreach($categories as $category)
                                               <option value="{{$category->id}}" @if($category->id==$searched_category) selected @endif>{{$category->name}}</option>     
                                            @endforeach
  
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="user">User</label>
                                        <select name="user" class="form-select select2_dropdown" id="user">
                                            <option value="">----</option>
                                            @foreach($users as $user)
                                               <option value="{{$user->id}}" @if($user->id==$searched_user) selected @endif>{{$user->name}}</option>     
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        
                                        <button class="btn btn-primary mt-4">Search</button>
                                    </div>

                                </div> 
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Photo</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Author</th>
                                            <th class="border-top-0">Actions</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                             $counter=1; 
                                        @endphp
                                        @foreach ($posts as $post)

                                        <tr>
                                            <td>{{$counter++}}</td>
                                            <td>{{$post->title}}</td>
                                            <td><img src="{{asset('uploads/'.$post->photo)}}" alt="" style="width:150px"></td>
                                            <td>{{$post->date}}</td>
                                            <td>{{$post->categoryName}}</td>
                                            <td>{{$post->authorName}} {{$post->authorLastName}}</td>
                                            <td>
                                                <a href="{{URL::to('admin/posts/edit/'.$post->id)}}" class="btn btn-primary">Edit</a>
                                                <form class="d-inline" action="{{URL::to('admin/posts/delete/'.$post->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this?'); ">Delete</button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                           
                                      
                                    </tbody>
                                </table>

                                {{$posts->appends(Request::input())->links('pagination::bootstrap-5')}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

@endSection
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