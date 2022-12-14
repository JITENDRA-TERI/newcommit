@include('layouts.frontend_header')
@include('layouts.frontend_main_header')


<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Blog</h2>
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
				<div class="col-lg-8 col-xl-9">
					<div class="main_blog_post_content">
					@foreach($getmediadata as $gm)
						<div class="for_blog list-type feat_property blog_details_inner">
						<div class="col-sm-12">
						     <div class="row">
							   <div class="col-sm-5">
							<div class="thumb w100 pb10">
							<img src="{{ asset('/') }}public/media_image/{{$gm->post_image}}"  class="img-whp" style="float: left;
    width: 434px !important;
    height: 266px;
    object-fit: cover;">
								
								
							</div></div>
							<div class="details pb5 col-sm-7">
								<div class="tc_content pt15">
                  <div class="bp_meta mb20">
                    <ul>
                      <li class="list-inline-item"><a href="#"><span class="flaticon-user fz15 mr10"></span> Pradeep Prajapati</a></li>
                      <li class="list-inline-item"><a href="#"><span class="flaticon-calendar fz15 mr10"></span> {{  date("F j, Y", strtotime($gm->post_date));  }}</a></li>
                    </ul>
                  </div>
									<h4 class="mt15 mb20">{{ $gm->title }}</h4>
									<p class="mb10">
									@php 
									$getdata=(substr($gm->abstract_data,0,250)); @endphp
									{!! $getdata !!}</p>
									<a class="tdu text-thm" href="page-blog-single.html">Read More</a>
								</div>
							</div>
							</div>
							</div>
						</div>
						@endforeach
					
						
         
						<div class="row">
							<div class="col-lg-12">
								<div class="mbp_pagination mt30">
									<ul class="page_navigation">
								    <li class="page-item">
								    	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="fa fa-arrow-left"></span></a>
								    </li>
								    <li class="page-item"><a class="page-link" href="#">1</a></li>
								    <li class="page-item"><a class="page-link" href="#">2</a></li>
								    <li class="page-item active" aria-current="page">
								    	<a class="page-link" href="#">3 <span class="sr-only">(current)</span></a>
								    </li>
								    <li class="page-item"><a class="page-link" href="#">4</a></li>
								    <li class="page-item"><a class="page-link" href="#">5</a></li>
								    <li class="page-item"><a class="page-link" href="#">...</a></li>
								    <li class="page-item"><a class="page-link" href="#">15</a></li>
								    <li class="page-item">
								    	<a class="page-link" href="#"><span class="fa fa-arrow-right"></span></a>
								    </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-xl-3">
					<div class="sidebar_search_widget">
						<div class="blog_search_widget">
              <h4 class="title mb25">Search</h4>
							<div class="input-group">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="fa fa-search"></span></button>
                </div>
								<input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username">
							</div>
						</div>
					</div>
					<div class="terms_condition_widget">
						<h4 class="title mb10">Categories</h4>
						<div class="widget_list">
							<ul class="list_details">
								<li><a href="#">Apartment <span class="float-right">5</span></a></li>
								<li><a href="#">Condo <span class="float-right">8</span></a></li>
								<li><a href="#">Family House <span class="float-right">12</span></a></li>
								<li><a href="#">Modern Villa <span class="float-right">5</span></a></li>
								<li><a href="#">Town House <span class="float-right">2</span></a></li>
							</ul>
						</div>
					</div>
					<div class="sidebar_feature_listing">
						<h4 class="title">Latest Posts</h4>
						<div class="media">
							<img class="align-self-start mr-3" src="images/blog/fls1.jpg" alt="fls1.jpg">
							<div class="media-body">
					    	<h5 class="mt-0 post_title">Redfin Ranks the Most Competitive Neighborhoods of 2021</h5>
					    	<a href="#">August 10, 2021</a>
							</div>
						</div>
						<div class="media">
							<img class="align-self-start mr-3" src="images/blog/fls2.jpg" alt="fls2.jpg">
							<div class="media-body">
					    	<h5 class="mt-0 post_title">Housing Markets That Changed the Most This Decade</h5>
					    	<a href="#">August 10, 2021</a>
							</div>
						</div>
						<div class="media mb0">
							<img class="align-self-start mr-3" src="images/blog/fls3.jpg" alt="fls3.jpg">
							<div class="media-body">
					    	<h5 class="mt-0 post_title">Redfin Unveils the Best Canadian Cities for Biking</h5>
					    	<a href="#">August 10, 2021</a>
							</div>
						</div>
					</div>
					<div class="blog_tag_widget">
						<h4 class="title">Popular Tags</h4>
						<ul class="tag_list">
							<li class="list-inline-item"><a href="#">Apertment</a></li>
							<li class="list-inline-item"><a href="#">Estate</a></li>
							<li class="list-inline-item"><a href="#">Luxury</a></li>
							<li class="list-inline-item"><a href="#">Real</a></li>
							<li class="list-inline-item"><a href="#">Real Estate</a></li>
              <li class="list-inline-item"><a href="#">Business</a></li>
              <li class="list-inline-item"><a href="#">Videos</a></li>
						</ul>
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
</style>

