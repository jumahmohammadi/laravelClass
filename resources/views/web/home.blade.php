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
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-1.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-2.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-3.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-4.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To Achieve Greater Walker</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- recent posts -->
							<div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-2.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-1.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-4.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To Achieve Greater Walker</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-3.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
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
						<h3 class="section-title">Calture</h3>
						<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">

                            @if(count($section1_post)>0)
							<div class="col-sm-6">
								<div class="post">
									<div class="thumb rounded">
										<a href="category.html" class="category-badge position-absolute">{{$section1_post[0]->category->name}}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{URL::to('blog/single/'.$section1_post[0]->id)}}">
											<div class="inner">
												<img src="{{asset('uploads/'.$section1_post[0]->photo)}}" alt="{{$section1_post[0]->title}}" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="#"><img src="{{asset('/uploads/'.$section1_post[0]->author->photo)}}" class="author_image" alt="author"/>{{$section1_post[0]->author->name.' '.$section1_post[0]->author->last_name}}</a></li>
										<li class="list-inline-item">{{$section1_post[0]->date}}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="blog-single.html">{{$section1_post[0]->title}}</a></h5>
									<p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
								</div>
							</div>
							<div class="col-sm-6">
								<!-- post -->
								<div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/editor-sm-1.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/editor-sm-2.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/editor-sm-3.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/editor-sm-4.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To Achieve Greater Walker</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>

							</div>
							@endif
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- horizontal ads -->
					<div class="ads-horizontal text-md-center">
						<span class="ads-title">- Sponsored Ad -</span>
						<a href="#">
							<img src="images/ads/ad-750.png" alt="Advertisement" />
						</a>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Trending</h3>
						<img src="images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
							<div class="col-sm-6">
								<!-- post large -->
								<div class="post">
									<div class="thumb rounded">
										<a href="category.html" class="category-badge position-absolute">Culture</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/trending-lg-1.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
										<li class="list-inline-item">29 March 2021</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="blog-single.html">Facts About Business That Will Help You Success</a></h5>
									<p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
								</div>
								<!-- post -->
								<div class="post post-list-sm square before-seperator">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/trending-sm-1.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm square before-seperator">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/trending-sm-2.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<!-- post large -->
								<div class="post">
									<div class="thumb rounded">
										<a href="category.html" class="category-badge position-absolute">Inspiration</a>
										<span class="post-format">
											<i class="icon-earphones"></i>
										</span>
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/trending-lg-2.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
										<li class="list-inline-item">29 March 2021</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
									<p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
								</div>
								<!-- post -->
								<div class="post post-list-sm square before-seperator">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/trending-sm-3.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">Here Are 8 Ways To Success Faster</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								<div class="post post-list-sm square before-seperator">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/trending-sm-4.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Inspiration</h3>
						<img src="images/wave.svg" class="wave" alt="wave" />
						<div class="slick-arrows-top">
							<button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
							<button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
						</div>
					</div>

					<div class="row post-carousel-twoCol post-carousel">
						<!-- post -->
						<div class="post post-over-content col-md-6">
							<div class="details clearfix">
								<a href="category.html" class="category-badge">Inspiration</a>
								<h4 class="post-title"><a href="blog-single.html">Want To Have A More Appealing Tattoo?</a></h4>
								<ul class="meta list-inline mb-0">
									<li class="list-inline-item"><a href="#">Katen Doe</a></li>
									<li class="list-inline-item">29 March 2021</li>
								</ul>
							</div>
							<a href="blog-single.html">
								<div class="thumb rounded">
									<div class="inner">
										<img src="images/posts/inspiration-1.jpg" alt="thumb" />
									</div>
								</div>
							</a>
						</div>
						<!-- post -->
						<div class="post post-over-content col-md-6">
							<div class="details clearfix">
								<a href="category.html" class="category-badge">Inspiration</a>
								<h4 class="post-title"><a href="blog-single.html">Feel Like A Pro With The Help Of These 7 Tips</a></h4>
								<ul class="meta list-inline mb-0">
									<li class="list-inline-item"><a href="#">Katen Doe</a></li>
									<li class="list-inline-item">29 March 2021</li>
								</ul>
							</div>
							<a href="blog-single.html">
								<div class="thumb rounded">
									<div class="inner">
										<img src="images/posts/inspiration-2.jpg" alt="thumb" />
									</div>
								</div>
							</a>
						</div>
						<!-- post -->
						<div class="post post-over-content col-md-6">
							<div class="details clearfix">
								<a href="category.html" class="category-badge">Inspiration</a>
								<h4 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being Relevant</a></h4>
								<ul class="meta list-inline mb-0">
									<li class="list-inline-item"><a href="#">Katen Doe</a></li>
									<li class="list-inline-item">29 March 2021</li>
								</ul>
							</div>
							<a href="blog-single.html">
								<div class="thumb rounded">
									<div class="inner">
										<img src="images/posts/inspiration-3.jpg" alt="thumb" />
									</div>
								</div>
							</a>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Latest Posts</h3>
						<img src="images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">

						<div class="row">
							
							<div class="col-md-12 col-sm-6">
								<!-- post -->
								<div class="post post-list clearfix">
									<div class="thumb rounded">
										<span class="post-format-sm">
											<i class="icon-picture"></i>
										</span>
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/latest-sm-1.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details">
										<ul class="meta list-inline mb-3">
											<li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
											<li class="list-inline-item"><a href="#">Trending</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
										<h5 class="post-title"><a href="blog-single.html">The Next 60 Things To Immediately Do About Building</a></h5>
										<p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
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
												<a href="blog-single.html"><span class="icon-options"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6">
								<!-- post -->
								<div class="post post-list clearfix">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/latest-sm-2.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details">
										<ul class="meta list-inline mb-3">
											<li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
											<li class="list-inline-item"><a href="#">Lifestyle</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
										<h5 class="post-title"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h5>
										<p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
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
												<a href="blog-single.html"><span class="icon-options"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6">
								<!-- post -->
								<div class="post post-list clearfix">
									<div class="thumb rounded">
										<span class="post-format-sm">
											<i class="icon-camrecorder"></i>
										</span>
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/latest-sm-3.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details">
										<ul class="meta list-inline mb-3">
											<li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
											<li class="list-inline-item"><a href="#">Fashion</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
										<h5 class="post-title"><a href="blog-single.html">Facts About Business That Will Help You Success</a></h5>
										<p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
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
												<a href="blog-single.html"><span class="icon-options"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6">
								<!-- post -->
								<div class="post post-list clearfix">
									<div class="thumb rounded">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/latest-sm-4.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details">
										<ul class="meta list-inline mb-3">
											<li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
											<li class="list-inline-item"><a href="#">Politic</a></li>
											<li class="list-inline-item">29 March 2021</li>
										</ul>
										<h5 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being Relevant</a></h5>
										<p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
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
												<a href="blog-single.html"><span class="icon-options"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div
						>
						<!-- load more button -->
						<div class="text-center">
							<button class="btn btn-simple">Load More</button>
						</div>

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
