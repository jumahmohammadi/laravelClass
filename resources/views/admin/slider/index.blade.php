@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Sliders">
    <x-slot name="links">
        / <li>Sliders</li>
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
                                <h3 class="box-title">Slider List </h3>
                                <a href="{{URL::to('admin/sliders/create')}}" class="btn btn-outline-primary">New Slide</a>
                            </div>
                             
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Photo</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Detail</th>
                                            <th class="border-top-0">Actions</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                             $counter=1; 
                                        @endphp
                                        @foreach ($sliders as $slide)

                                        <tr>
                                            <td>{{$counter++}}</td>
                                            <td><img src ="{{asset('uploads/'.$slide->photo)}}" style="width:120px"></td>
                                            <td>{{$slide->title}}</td>
                                            <td>{{$slide->detail}}</td>
                                            <td>
                                                <a href="{{URL::to('admin/sliders/'.$slide->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                                <form class="d-inline" action="{{URL::to('admin/sliders/'.$slide->id)}}" method="post">
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