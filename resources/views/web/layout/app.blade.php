<!DOCTYPE html>
<html lang="en-US">
<head>
	<?php $websiteSetting=setting();?>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>{{$websiteSetting->title}} - {{isset($page_title)?$page_title:""}}</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/'.$websiteSetting->logo)}}">

	<!-- STYLES -->
	<link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('website/css/all.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('website/css/slick.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('website/css/simple-line-icons.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('website/css/style.css')}}" type="text/css" media="all">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- preloader -->
<div id="preloader">
	<div class="book">
		<div class="inner">
			<div class="left"></div>
			<div class="middle"></div>
			<div class="right"></div>
		</div>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</div>

<!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	<header class="header-default">
		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				<!-- site logo -->
				<a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{asset('uploads/'.$websiteSetting->logo)}}" alt="logo" /></a> 

				<div class="collapse navbar-collapse">
					<!-- menus -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item  @if(isset($active_page) and $active_page=='home') active @endif">
							<a class="nav-link" href="{{URL::to('/')}}">Home  </a>
						</li>
						@foreach(getMenuCategories() as $category)
						<li class="nav-item @if(isset($active_page) and $active_page==$category->name) active @endif">
							<a class="nav-link" href="{{URL::to('/category/'.$category->name)}}">{{$category->name}}</a>
						</li>
						@endforeach
						
						<li class="nav-item">
							<a class="nav-link" href="{{URL::to('/contact')}}">Contact</a>
						</li>
					</ul>
				</div>

				<!-- header right section -->
				<div class="header-right">
					<!-- social icons -->
				       <x-social_media></x-social_media>
					<!-- header buttons -->
					<div class="header-buttons">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button">
						  @if(Auth::check())
							   <a href="{{URL::to('admin/dashboard')}}">
							      <span class="icon-user text-white"></span>
						        </a>
							 
                          @else 
                              <a href="{{URL::to('login')}}">
							    <span class="icon-user text-white"></span>
						     </a>
                          @endif							  
						</button>
					</div>
				</div>
			</div>
		</nav>
	</header>

	@yield('main_content')
	
	<!-- footer -->
	<footer>
		<div class="container-xl">
			<div class="footer-inner">
				<div class="row d-flex align-items-center gy-4">
					<!-- copyright text -->
					<div class="col-md-4">
						<span class="copyright">© {{date('Y')}} Powered By <a href="https://watantech.com/">WatanTech</a>.</span>
					</div>

					<!-- social icons -->
					<div class="col-md-4 text-center">
					    <x-social_media></x-social_media>
					</div>

					<!-- go to top button -->
					<div class="col-md-4">
						<a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Press ESC to close</h3>
		</div>
		<!-- form -->
		<form class="d-flex search-form" method="get" action="{{URL::to('/search/')}}">
			<input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search" name="word">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
		</form>
	</div>
</div>


<!-- JAVA SCRIPTS -->
<script src="{{asset('website/js/jquery.min.js')}}"></script>
<script src="{{asset('website/js/popper.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/slick.min.js')}}"></script>
<script src="{{asset('website/js/jquery.sticky-sidebar.min.js')}}"></script>
<script src="{{asset('website/js/custom.js')}}"></script>
@yield('internal_script')
</body>
</html>