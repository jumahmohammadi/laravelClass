@extends('web.layout.app')
@section('main_content')
<!-- hero section -->
	<section id="hero">

		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- home slider  -->
					<div id="home_slider" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-indicators">
							@foreach($sliders as $index=>$slider)
								<button type="button" data-bs-target="#home_slider" data-bs-slide-to="{{$index}}" @if($index==0)  class="active"  @endif aria-label="{{$slider->title}}"></button>
							@endforeach
								
							</div>
							<div class="carousel-inner">
								@foreach($sliders as $index=>$slider)
								
								<div class="carousel-item @if($index==0) active @endif">
								  <img src="{{asset('uploads/'.$slider->photo)}}" class="d-block w-100" alt="...">
								  <div class="carousel-caption">
									<h3>{{$slider->title}}</h3>
									<p>
										{{$slider->detail}}
									</p>
								  </div>
								</div>
								@endforeach
								
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#home_slider" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#home_slider" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>

					

				</div>

				<div class="col-lg-4">

					<!-- post tabs -->
					<div class="post-tabs rounded bordered">
						<!-- tab navs -->
						<ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
							<li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>
							<li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button></li>
						</ul>
						<!-- tab contents -->
						<div class="tab-content" id="postsTabContent">
							<!-- loader -->
							<div class="lds-dual-ring"></div>
							<!-- popular posts -->
							<div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
							
							   @foreach(PopularPosts() as $post)
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="{{URL::to('blog/single/'.$post->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$post->photo)}}" alt="{{$post->title}}" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{URL::to('blog/single/'.$post->id)}}">{{$post->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{date('d F Y', strtotime($post->date))}}</li>
										</ul>
									</div>
								</div>
								@endforeach
							</div>
							<!-- recent posts -->
							<div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
							
							@foreach(recentPosts() as $post)
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="{{URL::to('blog/single/'.$post->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$post->photo)}}" alt="{{$post->title}}" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{URL::to('blog/single/'.$post->id)}}">{{$post->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{date('d F Y', strtotime($post->date))}}</li>
										</ul>
									</div>
								</div>
								@endforeach

							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">{{$data['section1_title']}}</h3>
						<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
                            @if(count($section1_post)===0)
							  <p class="text-danger">No Posts Exist</p>  
                            @elseif(count($section1_post)>0)
							<div class="col-sm-6">
								<div class="post">
									<div class="thumb rounded">
										<a href="{{URL::to('/category/'.$section1_post[0]->category->name)}}" class="category-badge position-absolute">{{$section1_post[0]->category->name}}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{URL::to('blog/single/'.$section1_post[0]->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$section1_post[0]->photo)}}" alt="{{$section1_post[0]->title}}" />
											</div>
										<!-- </a> 2024-12-25 -->
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="{{URL::to('author/'.$section1_post[0]->author->id)}}"><img src="{{asset('/uploads/'.$section1_post[0]->author->photo)}}" class="author_image" alt="author"/>{{$section1_post[0]->author->name.' '.$section1_post[0]->author->last_name}}</a></li>
										<li class="list-inline-item">{{date('d F Y',strtotime($section1_post[0]->date))}}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{URL::to('blog/single/'.$section1_post[0]->id)}}">{{$section1_post[0]->title}}</a></h5>
									<p class="excerpt mb-0">{!!Str::words(strip_tags($section1_post[0]->detail),15)!!}</p>
								</div>
							</div>
							<div class="col-sm-6">
								@foreach($section1_post as $index=>$post)
							     @if($index!=0)
								<!-- post -->
								<div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="{{URL::to('blog/single/'.$post->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$post->photo)}}" alt="{{$post->title}}"  />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{URL::to('blog/single/'.$post->id)}}">{{$post->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{date('d F Y',strtotime($post->date))}}</li>
										</ul>
									</div>
								</div>
								 @endif
								@endforeach
							
								

							</div>
							@endif
						</div>
					</div>

					<div class="spacer" data-height="50"></div>


					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">{{$data['section2_title']}}</h3>
						<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
							@if(count($section2_post)===0)
							<p class="text-danger">No Posts Exist</p>  
							@elseif(count($section2_post)>0)
							<div class="col-sm-6">
								<!-- post large -->
								<div class="post">
									<div class="thumb rounded">
										<a href="{{URL::to('/category/'.$section2_post[0]->category->name)}}" class="category-badge position-absolute">{{$section2_post[0]->category->name}}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{URL::to('blog/single/'.$section2_post[0]->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$section2_post[0]->photo)}}" alt="{{$section2_post[0]->title}}" />
											</div>
										<!-- </a> 2024-12-25 -->
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="{{URL::to('author/'.$section2_post[0]->author->id)}}"><img src="{{asset('/uploads/'.$section2_post[0]->author->photo)}}" class="author_image" alt="author"/>{{$section2_post[0]->author->name.' '.$section2_post[0]->author->last_name}}</a></li>
										<li class="list-inline-item">{{date('d F Y',strtotime($section2_post[0]->date))}}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{URL::to('blog/single/'.$section2_post[0]->id)}}">{{$section2_post[0]->title}}</a></h5>
									<p class="excerpt mb-0">{!!Str::words(strip_tags($section2_post[0]->detail),15)!!}</p>
								</div>
							  	 
								@foreach($section2_post as $index=>$post)	
								@if($index==1 or $index==2)
								<div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="{{URL::to('blog/single/'.$post->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$post->photo)}}" alt="{{$post->title}}"  />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{URL::to('blog/single/'.$post->id)}}">{{$post->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{date('d F Y',strtotime($post->date))}}</li>
										</ul>
									</div>
								</div>
								@endif
								@endforeach

							</div>
							<div class="col-sm-6">
							
								<!-- post large -->
								 @if(isset($section2_post[3]))
								<div class="post">
									<div class="thumb rounded">
										<a href="{{URL::to('/category/'.$section2_post[3]->category->name)}}" class="category-badge position-absolute">{{$section2_post[3]->category->name}}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{URL::to('blog/single/'.$section2_post[3]->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$section2_post[3]->photo)}}" alt="{{$section2_post[3]->title}}" />
											</div>
										<!-- </a> 2024-12-25 -->
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="{{URL::to('author/'.$section2_post[3]->author->id)}}"><img src="{{asset('/uploads/'.$section2_post[3]->author->photo)}}" class="author_image" alt="author"/>{{$section2_post[3]->author->name.' '.$section2_post[3]->author->last_name}}</a></li>
										<li class="list-inline-item">{{date('d F Y',strtotime($section2_post[3]->date))}}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{URL::to('blog/single/'.$section2_post[3]->id)}}">{{$section2_post[3]->title}}</a></h5>
									<p class="excerpt mb-0">{!!Str::words(strip_tags($section2_post[3]->detail),15)!!}</p>
								</div>
								@endif


								<!-- post -->
								@foreach($section2_post as $index=>$post)	
								@if($index==4 or $index==5)
								<div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="{{URL::to('blog/single/'.$post->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$post->photo)}}" alt="{{$post->title}}"  />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{URL::to('blog/single/'.$post->id)}}">{{$post->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{date('d F Y',strtotime($post->date))}}</li>
										</ul>
									</div>
								</div>
								@endif
								@endforeach
								
							</div>
							@endif
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">{{$data['section3_title']}}</h3>
						<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
						<div class="slick-arrows-top">
							<button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
							<button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
						</div>
					</div>

					<div class="row post-carousel-twoCol post-carousel">
						
						<!-- post -->
						@if(count($section3_post)===0)
						<p class="text-danger">No Posts Exist</p> 
						@endif
						@foreach($section3_post as $post)
						<div class="post post-over-content col-md-6">
							<div class="details clearfix">
								<a href="{{URL::to('category/'.$post->category->name)}}" class="category-badge">{{$post->category->name}}</a>
								<h4 class="post-title"><a href="{{URL::to('blog/single/'.$post->id)}}">{{$post->title}}</a></h4>
								<ul class="meta list-inline mb-0">
									<li class="list-inline-item"><a href="{{URL::to('author/'.$post->author->id)}}">{{$post->author->name.' '.$post->author->last_name}}</a></li>
									<li class="list-inline-item">{{date('d F Y',strtotime($post->date))}}</li>
								</ul>
							</div>
							<a href="blog-single.html">
								<div class="thumb rounded">
									<div class="inner">
										<img src="{{asset('uploads/'.$post->photo)}}" alt="thumb" />
									</div>
								</div>
							</a>
						</div>
						@endforeach
					
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">{{$data['section4_title']}}</h3>
						<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">

						<div class="row">
							@if(count($section4_post)===0)
							<p class="text-danger">No Posts Exist</p> 
							@endif	
						@foreach($section4_post as $post)
							<div class="col-md-12 col-sm-6">
								<!-- post -->
								 
								<div class="post post-list clearfix">
									<div class="thumb rounded">
										<span class="post-format-sm">
											<i class="icon-camrecorder"></i>
										</span>
										<a href="{{URL::to('/blog/single/'.$post->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$post->photo)}}" alt="{{$post->title}}" />
											</div>
										</a>
									</div>
									<div class="details">
										<ul class="meta list-inline mb-3">
											<li class="list-inline-item"><a href="{{URL::to('author/'.$post->author->id)}}"><img src="{{asset('uploads/'.$post->author->photo)}}" class="author_image" alt="author"/>{{$post->author->name.' '.$post->author->last_name}}</a></li>
											<li class="list-inline-item"><a href="{{URL::to('category/'.$post->category->name)}}">{{$post->category->name}}</a></li>
											<li class="list-inline-item">{{date('d F Y',strtotime($post->date))}}</li>
										</ul>
										<h5 class="post-title"><a href="{{URL::to('blog/single/'.$post->id)}}">{{$post->title}}</a></h5>
										<p class="excerpt mb-0">{{Str::words(strip_tags($post->detail),12)}}</p>
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
												<a href="{{URL::to('blog/single/'.$post->id)}}"><span class="icon-options"></span></a>
											</div>
										</div>
									</div>
								</div>
							
							</div>

							
							@endforeach
							
						</div
						>
					

					</div>

				</div>
				<div class="col-lg-4">

					<!-- sidebar -->
					@include('web.layout.sidebar')
				</div>

			</div>

		</div>
	</section>
	@endsection
