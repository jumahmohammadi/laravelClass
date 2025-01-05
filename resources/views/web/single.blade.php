@extends('web.layout.app')

@section('main_content')


	<!-- section main content -->
	<section class="main-content mt-3">
		<div class="container-xl">

            <nav aria-label="breadcrumb">
               <!-- breadcrumb -->
				<x-website_page_address>
				   	<x-slot name="page_links">
					   <li class="breadcrumb-item"><a href="{{URL::to('/category/'.$post->category->name)}}">{{$post->category->name}}</a></li>
					   <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
					</x-slot>
			    </x-website_page_address>
            </nav>

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- post single -->
                    <div class="post post-single">
						<!-- post header -->
						<div class="post-header">
							<h1 class="title mt-0 mb-3">{{$post->title}}</h1>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item"><a href="{{URL::to('/author/'.$post->author->id)}}"><img src="{{asset('uploads/'.$post->author->photo)}}" class="author_image" alt="author"/>{{$post->author->name .' '. $post->author->last_name}}</a></li>
								<li class="list-inline-item"><a href="{{URL::to('/category/'.$post->category->name)}}">{{$post->category->name}}</a></li>
								<li class="list-inline-item">{{date('d F Y',strtotime($post->date))}}</li>
							</ul>
						</div>
						<!-- featured image -->
						<div class="featured-image">
							<img src="{{asset('uploads/'.$post->photo)}}" alt="{{$post->title}}" />
						</div>
						<!-- post content -->
						<div class="post-content clearfix">
						{!!$post->detail!!}
						</div>
						<!-- post bottom section -->
						<div class="post-bottom">
							<div class="row d-flex align-items-center">
								<div class="col-md-6 col-12 text-center text-md-start">
									<!-- tags -->
									@foreach($post->tags as $tag)
									<a href="{{URL::to('/tag/'.$tag->name)}}" class="tag">#{{$tag->name}}</a>
									@endforeach
								</div>
								<div class="col-md-6 col-12">
									<!-- social icons -->
									<ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
										<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

                    </div>

					<div class="spacer" data-height="50"></div>

					<div class="about-author padding-30 rounded">
						<div class="thumb">
							<img src="{{asset('uploads/'.$post->author->photo)}}" class="author_large_image" alt="{{$post->author->name}}" />
						</div>
						<div class="details">
							<h4 class="name"><a href="{{URL::to('author/'.$post->author->id)}}">{{$post->author->name.' '.$post->author->last_name}}</a></h4>
							<p>{{$post->author->detail}}</p>
							<!-- social icons -->
							<ul class="social-icons list-unstyled list-inline mb-0">
							  @if($post->author->facebook_link)
								<li class="list-inline-item"><a href="{{$post->author->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
							  @endif
							  @if($post->author->twitter_link)
								<li class="list-inline-item"><a href="{{$post->author->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
							  @endif
							  @if($post->author->instagram_link)
								<li class="list-inline-item"><a href="{{$post->author->instagram_link}}"><i class="fab fa-instagram"></i></a></li>
							  @endif
							</ul>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Comments (3)</h3>
						<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
					</div>
					@if(Session::has('comment_error'))
					<div class="alert alert-danger">
						<h4>{{Session::get('comment_error')}}</h4>
					</div>
					@endif
					<!-- post comments -->
					<div class="comments bordered padding-30 rounded" id="comment_section">

						<ul class="comments">
							<!-- comment item -->
							@foreach($comments as $comment)
							<li class="comment rounded">
								<div class="thumb">
									<img src="{{asset('website/images/user.png')}}" class="commentore_image" alt="John Doe" />
								</div>
								<div class="details">
									<h4 class="name"><a href="#">{{$comment->name}}</a></h4>
									<span class="date">{{date('M d, Y h:i a',strtotime($comment->created_at))}}</span>
									<p>{{$comment->comment}}</p>
									<button class="btn btn-default btn-sm reply_btn" comment="comment{{$comment->id}}">Reply</button>
                                  {{-- reply form --}}
									<div class="reply-form comment-form rounded bordered p-3 mt-3 " id="comment{{$comment->id}}" style="display:none">
										<form id="comment-form" class="comment-form" method="post" action="{{URL::to('comment/save')}}">
											 @csrf
											<div class="messages"></div>
											<div class="row">
												<div class="column col-md-12">
													<!-- Comment textarea -->
													<div class="form-group">
														<textarea name="comment" id="comment" class="form-control" rows="2" placeholder="Your comment here..." required="required"></textarea>
													</div>
												</div>
												<div class="column col-md-6">
													<!-- Email input -->
													<div class="form-group">
														<input type="hidden" name="post_id" value="{{$post->id}}">
														<input type="hidden" name="parent_id" value="{{$comment->id}}">
														<input type="email" class="form-control" id="email" name="email" placeholder="Email address" required="required">
													</div>
												</div>
												<div class="column col-md-6">
													<!-- Email input -->
													<div class="form-group">
														<input type="text" class="form-control" id="name" name="name" placeholder="Your name" required="required">
													</div>
												</div>
											</div>
											<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit</button><!-- Submit Button -->
										</form>
									</div>
								</div>

								
							</li>
							@endforeach
							
						</ul>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Leave Comment</h3>
						<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
					</div>
					<!-- comment form -->
					<div class="comment-form rounded bordered padding-30">

						<form id="comment-form" class="comment-form" method="post" action="{{URL::to('comment/save')}}">
				             @csrf
							<div class="messages"></div>
							
							<div class="row">

								<div class="column col-md-12">
									<!-- Comment textarea -->
									<div class="form-group">
										<textarea name="comment" id="comment" class="form-control" rows="4" placeholder="Your comment here..." required="required"></textarea>
									</div>
								</div>

								<div class="column col-md-6">
									<!-- Email input -->
									<div class="form-group">
										<input type="hidden" name="post_id" value="{{$post->id}}">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email address" required="required">
									</div>
								</div>

								<div class="column col-md-6">
									<!-- Name input -->
									<div class="form-group">
										<input type="text" class="form-control" name="website" id="website" placeholder="Website" >
									</div>
								</div>
	
								<div class="column col-md-12">
									<!-- Email input -->
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Your name" required="required">
									</div>
								</div>
						
							</div>
	
							<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit</button><!-- Submit Button -->
	
						</form>
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
@section('internal_script')
<script>
	$(".reply_btn").click(function(){
		$replyFrom=$(this).attr('comment');
		$("#"+$replyFrom).toggle();
	})
</script>
@endsection