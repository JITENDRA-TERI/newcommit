@include('layouts.frontend_header')
@include('layouts.frontend_main_header')


<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Testimonial</h2>
						<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Blog</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Main Blog Post Content -->
	<section class="blog_post_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="main_blog_post_content row">
					@foreach($gettestimonial as $gt)
						
						<div class="col-sm-6 boxcss">
						     <div class="row">
							   <div class="col-sm-3">
							<div class="thumb w100 pb10">
							<img src="{{ asset('/') }}/public/testimonial_image/{{$gt->images}}"  class="img-whp" style="border-radius: 50%;">
								
								
							</div></div>
							<div class="details pb5 col-sm-9">
								<div class="tc_content pt15">
                  <div class="bp_meta mb20">
                    <ul>
                      <li class="list-inline-item"><a href="#"><span class="flaticon-user fz15 mr10"></span> {{$gt->name }}</a></li>
					  <br>
                      <li class="list-inline-item"><a href="#"><span class="flaticon-calendar fz15 mr10"></span> {{$gt->company_name }}</a></li>
                    </ul>
                  </div>
									
									<p class="mb10">
									{{ ($gt->description) }}</p>
									
								</div>
							</div>
							</div>
							</div>
						
						@endforeach
				
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

.feat_property .thumb {
    background: #ffffff;
}
.boxcss{
	    border-radius: 7%;
    border: 1px solid;
    padding: 30px;
    margin-bottom: 27px;
    box-shadow: 2px 0px 8px 0px;
}
</style>
