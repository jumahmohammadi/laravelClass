<?php $websiteSetting = setting();?>
<div class="sidebar">
	<!-- widget about -->
	<div class="widget rounded">
		<div class="widget-about data-bg-image text-center" data-bg-image="{{asset('website/images/map-bg.png')}}">
			<img src="{{asset('uploads/' . $websiteSetting->logo)}}" alt="logo" class="mb-4" />
			<p class="mb-4">
				{{$websiteSetting->detail}}
			</p>
			<x-social_media></x-social_media>
		</div>
	</div>

	<!-- widget popular posts -->
	<div class="widget rounded">
		<div class="widget-header text-center">
			<h3 class="widget-title">Popular Posts</h3>
			<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
		</div>
		<div class="widget-content">
			@foreach(PopularPosts() as $index => $p)
				<!-- post -->
				<div class="post post-list-sm circle">
					<div class="thumb circle">
						<span class="number">{{$index + 1}}</span>
						<a href="{{URL::to('blog/single/' . $p->id)}}">
							<div class="inner">
								<img src="{{asset('uploads/' . $p->photo)}}" alt="{{$p->title}}" />
							</div>
						</a>
					</div>
					<div class="details clearfix">
						<h6 class="post-title my-0"><a href="{{URL::to('blog/single/' . $p->id)}}">{{$p->title}}</a>
						</h6>
						<ul class="meta list-inline mt-1 mb-0">
							<li class="list-inline-item">{{date('d F Y', strtotime($p->date))}}</li>
						</ul>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<!-- widget categories -->
	<div class="widget rounded">
		<div class="widget-header text-center">
			<h3 class="widget-title">Explore Topics</h3>
			<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
		</div>
		<div class="widget-content">
			<ul class="list">
				@foreach(getAllCategoriesWithPostCount() as $cateogory)
					<li><a
							href="{{URL::to('/category/' . $cateogory->name)}}">{{$cateogory->name}}</a><span>({{$cateogory->posts_count}})</span>
					</li>
				@endforeach
			</ul>
		</div>

	</div>


	<!-- widget tags -->
	<div class="widget rounded">
		<div class="widget-header text-center">
			<h3 class="widget-title">Tag Clouds</h3>
			<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
		</div>
		<div class="widget-content">
			@foreach (GetAllTags() as $tag)
				<a href="{{URL::to('tag/'.$tag->name)}}" class="tag">#{{$tag->name}}</a>
			@endforeach
			
		</div>
	</div>

</div>