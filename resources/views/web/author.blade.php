@extends('web.layout.app')

@section('main_content')
 <!-- section main content -->
 <section class="main-content">
		<div class="container-xl">
        <nav aria-label="breadcrumb">
               <!-- breadcrumb -->
				<x-website_page_address>
				   	<x-slot name="page_links">
					   <li class="breadcrumb-item active"><a href="#">{{$page_title}}</a></li>
					</x-slot>
			    </x-website_page_address>
            </nav>

			<div class="row gy-4">

				<div class="col-lg-8">

                    <div class="row gy-4">
                        @if(count($posts)===0)
                        <div class="alert alert-warning text-center rounded">
                           <p>No Post Exist</p>
                        </div>
                       @endif
                      @foreach($posts as $post)
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <a href="{{URL::to('/category/'.$post->category->name)}}" class="category-badge position-absolute">{{$post->category->name}}</a>
                                    <span class="post-format">
                                        <i class="icon-earphones"></i>
                                    </span>
                                    <a href="{{URL::to('/blog/single/'.$post->id)}}">
                                        <div class="inner">
                                            <img src="{{asset('uploads/'.$post->photo)}}" alt="{{$post->title}}" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><img src="{{asset('uploads/'.$post->author->photo)}}" class="author_image" alt="author"/>{{$post->author->name.' '.$post->author->last_name}}</a></li>
                                        <li class="list-inline-item">{{date('d F Y',strtotime($post->date))}}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{URL::to('/blog/single/'.$post->id)}}">{{$post->title}}</a></h5>
                                    <p class="excerpt mb-0">{!!Str::words(strip_tags($post->detail),15)!!}</p>
                                </div>
                                <div class="post-bottom clearfix d-flex align-items-center">
                                    <div class="social-share me-auto">
                                        <button class="toggle-button icon-share"></button>
                                        <ul class="icons list-unstyled list-inline mb-0">
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="more-button float-end">
                                        <a href="{{URL::to('/blog/single/'.$post->id)}}"><span class="icon-options"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endforeach
                    </div>

					<nav>
                        {{$posts->links('pagination::bootstrap-5')}}
                       
					</nav>

				</div>
				<div class="col-lg-4">

					<!-- sidebar -->
					@include('web.layout.sidebar')

				</div>

			</div>

		</div>
	</section>

@endsection