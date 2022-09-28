@include('layouts.frontend_header')
@include('layouts.frontend_main_header')
<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Gallery</h2>
						<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- About Text Content -->
	<section class="about-section pb70">
		<div class="container">
			<div class="row">
			@foreach($getgallerydata as $gl)
				<div class="col-sm-3 col-md-3 col-lg-3">
					<div class="gallery_item">
						<img class="img-fluid img-circle-rounded w100" src="{{ asset('/') }}/public/gallery_images/{{ $gl->image_name }}" alt="lg1.jpg">
						<div class="gallery_overlay"><a class="icon popup-img" href="{{ asset('/') }}/public/gallery_images/{{ $gl->image_name }}"><span class="flaticon-photo-camera"></span></a></div>
					</div>
				</div>
			@endforeach	
				
				
				
			
				
			</div>
		</div>
	</section>
			@include('layouts.frontend_footer')
<style>
header.header-nav.menu_style_home_one .ace-responsive-menu li a {
    color: #0D263B !important;
    font-size: 13px;
    font-family: Cerebri Sans;
    font-weight: 600;
    line-height: 17px;
}
.sub-menu
{
	position: absolute;
    z-index: 9999;
}


</style>