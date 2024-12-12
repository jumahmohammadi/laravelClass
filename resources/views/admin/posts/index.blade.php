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

                                {{$posts->links('pagination::bootstrap-5')}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

@endSection
