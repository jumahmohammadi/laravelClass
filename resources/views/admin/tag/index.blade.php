@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Tags">
    <x-slot name="links">
        / <li>Tags</li>
    </x-slot>
</x-breadcrumb>
@endsection


@section('mainContent')

@if(Session::has('alert_message'))
<x-message text="{{Session::get('alert_message')}}" cls="{{Session::get('alert_class')}}"></x-message>
@endif
 <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="d-flex justify-content-between mb-4">
                                <h3 class="box-title">Tag List </h3>
                                <a href="{{URL::to('admin/tags/add')}}" class="btn btn-outline-primary">New Tag</a>
                            </div>
                             
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Tag</th>
                                            <th class="border-top-0">Actions</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                             $counter=1; 
                                        @endphp
                                        @foreach ($tags as $tag)

                                        <tr>
                                            <td>{{$counter++}}</td>
                                            <td>{{$tag->name}}</td>
                                            <td>
                                                <a href="{{URL::to('admin/tags/edit/'.$tag->id)}}" class="btn btn-primary">Edit</a>
                                                <form class="d-inline" action="{{URL::to('admin/tags/delete/'.$tag->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this?'); ">Delete</button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                           
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

@endsection


@section('internal_javascript')

@endsection