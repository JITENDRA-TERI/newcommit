@include('layouts.frontend_header')
@include('layouts.frontend_main_header')

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">About Us</h2>
						<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">About Us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- About Text Content -->
	<section class="about-section bb1 pb70">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="about_thumb mb30-smd" style="text-align: center;
    padding-top: 97px;">
						<img class="img-fluid" src="{{ asset('/') }}public/images/photo6242145910427594040.jpg" alt="2.jpg">
						<br><br>
						<h4 class="align-center"><strong>Pradeep Prajapati <br><br>
Founder & CEO</strong>

</h4><br>
<a href="https://www.linkedin.com/in/pradeep-prajapati-41911739/"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_content">
						<p class="large">{!! $aboutdata->abstract_about !!}</p>
					</div>
				</div>
			</div>
		
		</div>
	</section>
  
  <!-- Our Team -->
  <section class="our-team pb40 bb1">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="main-title text-center">
            <h2>Meet Our Agents</h2>
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="team_slider_home1">
		  @foreach($getteamdata as $gt)
          <div class="item">
              <div class="team_member">
                <div class="thumb"> <img class="img-fluid" src="{{ asset('/') }}/public/team_photos/{{$gt->member_image}}" alt="1.jpg">
                  <div class="overylay">
                    <ul class="social_icon">
					 @if($gt->fb_link !='')
                      <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
				     @endif
					 @if($gt->twitter_link !='')
                      <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
				     @endif
					 @if($gt->instagram_link !='')
                      <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
				     @endif
					 @if($gt->linkndin_link !='')
                      <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
				     @endif
                    </ul>
                  </div>
                </div>
                <div class="details">
                  <h4><a href="page-agent-single.html">{{$gt->member_name}}</a></h4>
                  <p>{{$gt->designation}}</p>
                </div>
              </div>
            </div>
			@endforeach
           
            
          
           
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Property Cities -->
  

	
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