@include('layouts.frontend_header')
@include('layouts.frontend_main_header')

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">Property Listing</h2>
						<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Property Listing</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="our-listing pb30-991">
		<div class="container">
			<div class="row">
			<div class="col-sm-12">
			    <div class="row">
				
				@foreach($propertylisting as $pl)
				   <div class="col-xl-6">
              <div class="feat_property list listing">
                <div class="thumb">
                  <img class="img-whp" src="{{ asset('/') }}public/property_photos/{{ $pl->attachment_path }} " alt="lls71.jpg">
                  <div class="thmb_cntnt">
				  @if ($pl->featured_property == 1)
                    <ul class="tag mb0">
                      <li class="list-inline-item"><a href="#">FEATURED</a></li>
                    </ul>
					@endif
					@if ($pl->property_status == 'Sold')
                    <ul class="tag2 mb0">
                      <li class="list-inline-item"><a href="#">FOR SALE</a></li>
                    </ul>
					@endif
                  </div>
                  <div class="thmb_cntnt2">
                    <ul class="listing_gallery mb0">
                      <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr5"></span> 22</a></li>
                      <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr5"></span> 3</a></li>
                    </ul>
                  </div>
                </div>
                <div class="details style7">
                  <div class="tc_content">
                    <div class="wrapper float-left fn-md">
                      <h4><a href="page-listing-single-v8.html">{{ $pl->property_title }}</a></h4>
                      <p>{{ $pl->property_location }}</p>
                      <ul class="prop_details mb0">
					  @if($pl->bedrooms !='')
                        <li class="list-inline-item"><a href="#"><span class="flaticon-bed pr5"></span> <br>{{ $pl->bedrooms }}</a></li>
					  @endif
					   @if($pl->bathroom !='')
                        <li class="list-inline-item"><a href="#"><span class="flaticon-bath pr5"></span> <br>{{$pl->bathroom}}</a></li>
					   @endif
                        @if($pl->property_area !='')
                        <li class="list-inline-item"><a href="#"><span class="flaticon-ruler pr5"></span> <br>{{$pl->property_area}}</a></li>
					    @endif
                      </ul>
                    </div>
                  </div>
				  
                  <div class="fp_footer">
                    <ul class="fp_meta float-left mb0">
                      <li class="list-inline-item">
                        <a href="#"><small><del class="body-color">@if($pl->property_price !='') {{ $pl->property_price }} @endif</del></small><br>
                        
                      </li>
                    </ul>
                    <ul class="fp_meta float-right mb0">
                      <li class="list-inline-item"><a class="icon" href="#"><span class="flaticon-resize"></span></a></li>
                      <li class="list-inline-item"><a class="icon" href="#"><span class="flaticon-add"></span></a></li>
                      <li class="list-inline-item"><a class="icon" href="#"><span class="flaticon-heart-shape-outline"></span></a></li>
                    </ul>
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
</style>
