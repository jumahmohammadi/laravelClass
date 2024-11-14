@extends('layout.app')

@section('breadcrumb')
<x-breadcrumb pageTitle="Categories">
    <x-slot name="links">
        / <li>Categories</li>
    </x-slot>
</x-breadcrumb>
@endsection


@section('mainContent')

<h1>Categories page</h1>
{{URL::full()}} <br>
{{URL::current()}} <br>
{{URL::previous()}} <br>
 <br>
 <a href="{{URL::previous()}}">Go back</a> <br>
<a href="{{URL::to('admin/posts')}}">Go to posts page</a> <br>
<a href="{{URL::to('admin/dashboard')}}">Go to Dashboard </a>


<br>

@endsection


@section('internal_javascript')

@endsection