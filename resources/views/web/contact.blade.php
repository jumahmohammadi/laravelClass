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
        </div>  
 </section> 
 
 <section class="main-content">
	<div class="container-xl">

		<div class="row">
					
			<div class="col-md-4">
				<!-- contact info item -->
				<div class="contact-item bordered rounded d-flex align-items-center">
					<span class="icon icon-phone"></span>
					<div class="details">
						<h3 class="mb-0 mt-0">Phone</h3>
						<p class="mb-0">{{$setting->phone}}</p>
					</div>
				</div>
				<div class="spacer d-md-none d-lg-none" data-height="30" style="height: 30px;"></div>
			</div>

			<div class="col-md-4">
				<!-- contact info item -->
				<div class="contact-item bordered rounded d-flex align-items-center">
					<span class="icon icon-envelope-open"></span>
					<div class="details">
						<h3 class="mb-0 mt-0">E-Mail</h3>
						<p class="mb-0">{{$setting->email}}</p>
					</div>
				</div>
				<div class="spacer d-md-none d-lg-none" data-height="30" style="height: 30px;"></div>
			</div>

			<div class="col-md-4">
				<!-- contact info item -->
				<div class="contact-item bordered rounded d-flex align-items-center">
					<span class="icon icon-map"></span>
					<div class="details">
						<h3 class="mb-0 mt-0">Location</h3>
						<p class="mb-0">{{$setting->address}}</p>
					</div>
				</div>
			</div>

		</div>

		<div class="spacer" data-height="50" style="height: 50px;"></div>

		<!-- section header -->
		<div class="section-header">
			<h3 class="section-title">Send Message</h3>
			<img src="{{asset('website/images/wave.svg')}}" class="wave" alt="wave" />
		</div>

		<!-- Contact Form -->
		<form id="contact-form" class="contact-form" method="post">
			
			<div class="messages"></div>
			
			<div class="row">
				<div class="column col-md-6">
					<!-- Name input -->
					<div class="form-group">
						<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Your name" required="required" data-error="Name is required.">
						<div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div><div class="help-block with-errors"></div>
					</div>
				</div>
				
				<div class="column col-md-6">
					<!-- Email input -->
					<div class="form-group">
						<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email address" required="required" data-error="Email is required.">
						<div class="help-block with-errors"></div>
					</div>
				</div>

				<div class="column col-md-12">
					<!-- Email input -->
					<div class="form-group">
						<input type="text" class="form-control" id="InputSubject" name="InputSubject" placeholder="Subject" required="required" data-error="Subject is required.">
						<div class="help-block with-errors"></div>
					</div>
				</div>
		
				<div class="column col-md-12">
					<!-- Message textarea -->
					<div class="form-group">
						<textarea name="InputMessage" id="InputMessage" class="form-control" rows="4" placeholder="Your message here..." required="required" data-error="Message is required."></textarea>
						<div class="help-block with-errors"></div>
					</div>
				</div>
			</div>

			<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit Message</button><!-- Send Button -->

		</form>
		<!-- Contact Form end -->
	</div>
</section>
 @endsection       