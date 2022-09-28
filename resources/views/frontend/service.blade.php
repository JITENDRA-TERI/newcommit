@include('layouts.frontend_header')
@include('layouts.frontend_main_header')

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Services</h2>
						<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Services</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="about-section bb1 pb70">
		<div class="container">
			<div class="row">
			<div class="col-sm-12">
			    <div class="row">
				    <div class="col-sm-4">
					@if($getservices->service_image !='')
						<img src="{{ asset('/') }}/public/service_image/{{$getservices->service_image}}" style="width:100%;">
					@else
						<img src="{{ asset('/') }}/public/images/No_Image_Available.jpg" style="width:100%;">
					@endif
					
					
					</div>
					<div class="col-sm-8">
					{!! $getservices->abstract_service !!}
					</div>
				     
				</div>
			</div>
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
