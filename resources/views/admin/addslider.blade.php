@extends('layouts.admin-header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.min.css">
<div class="container-scroller">
@extends('layouts.dashboardhead')
    <div class="container-fluid page-body-wrapper">
      @yield('content')
		  @include('layouts.sidebar-admin')
		  <div class="main-panel">
          <div class="content-wrapper">
   
          <div class="col-lg-12 grid-margin stretch-card" style="margin-top:20px;">
		  <div class="card-body">
                    <h4 class="card-title text-center"><strong>{{ ( (Request::segment(3)=='add-media') ? 'Add' : 'Update') }} Slider</strong></h4>
					 @if(session()->has('message'))
						<div class="alert alert-success" id="successmessage">
							{{ session()->get('message') }}
						</div>
				        @endif
					<hr>
                     @if ( Request::segment(3)=='edit' )
					<form class="forms-sample" action="{{ route('update-media-data',$addmedia->id)}}" method="post" enctype="multipart/form-data">
					@else 
                    <form class="forms-sample" action="{{ route('store-slider-data') }}" method="post" enctype="multipart/form-data">
				    @endif
					{{ csrf_field() }}
                          <div class="form-group">
                        <label>File upload<span style="color:red;">*</span></label>
                        <input type="file" name="sliderimage[]" class="form-control image-file" id="imageUpload"  accept="image/x-png,image/gif,image/jpeg" multiple>
                         
						@if ($errors->has('sliderimage'))
						<p class="help-block" style="color:red;">
						 Select Image
						</p> 
						@endif
                              </div>
                   
					  
					    <div class="form-group">
                        <label for="exampleInputName1">Select Effects<span style="color:red;">*</span> </label>
                        <select name="slidereffects" class="form-control" id="slider_effects">
						<option value="">--Select Slider Effects--</option>
						<option value="bounce">Bounce</option>
						<option value="flash">flash</option>
						<option value="pulse">pulse</option>
						<option value="rubberBand">rubberBand</option>
						<option value="shake">shake</option>
						<option value="swing">swing</option>
						<option value="tada">tada</option>
						<option value="wobble">wobble</option>
						<option value="jello">jello</option>
						<option value="bounceIn">bounceIn</option>
						<option value="bounceInDown">bounceInDown</option>
						<option value="bounceInLeft">bounceInLeft</option>
						<option value="bounceInRight">bounceInRight</option>
						<option value="bounceInUp">bounceInUp</option>
						<option value="bounceOut">bounceOut</option>
						<option value="bounceOutDown">bounceOutDown</option>
						<option value="bounceOutLeft">bounceOutLeft</option>
						<option value="bounceOutRight">bounceOutRight</option>
						<option value="bounceOutUp">bounceOutUp</option>
						<option value="fadeIn">fadeIn</option>
						<option value="fadeInDown">fadeInDown</option>
						<option value="fadeInDownBig">fadeInDownBig</option>
						<option value="fadeInLeft">fadeInLeft</option>
						<option value="fadeInLeftBig">fadeInLeftBig</option>
						<option value="fadeInRight">fadeInRight</option>
						<option value="fadeInRightBig">fadeInRightBig</option>
						<option value="fadeInUp">fadeInUp</option>
						<option value="fadeInUpBig">fadeInUpBig</option>
						<option value="fadeOut">fadeOut</option>
						<option value="fadeOutDown">fadeOutDown</option>
						<option value="fadeOutDownBig">fadeOutDownBig</option>
						<option value="fadeOutLeft">fadeOutLeft</option>
						<option value="fadeOutLeftBig">fadeOutLeftBig</option>
						<option value="fadeOutRight">fadeOutRight</option>
						<option value="fadeOutRightBig">fadeOutRightBig</option>
						<option value="fadeOutUp">fadeOutUp</option>
						<option value="fadeOutUpBig">fadeOutUpBig</option>
						<option value="flipInX">flipInX</option>
						<option value="flipInY">flipInY</option>
						<option value="flipOutX">flipOutX</option>
						<option value="flipOutY">flipOutY</option>
						<option value="lightSpeedIn">lightSpeedIn</option>
						<option value="lightSpeedOut">lightSpeedOut</option>
						<option value="rotateIn">rotateIn</option>
						<option value="rotateInDownLeft">rotateInDownLeft</option>
						<option value="rotateInDownRight">rotateInDownRight</option>
						<option value="rotateInUpLeft">rotateInUpLeft</option>
						<option value="rotateInUpRight">rotateInUpRight</option>
						<option value="rotateOut">rotateOut</option>
						<option value="rotateOutDownLeft">rotateOutDownLeft</option>
						<option value="rotateOutDownRight">rotateOutDownRight</option>
						<option value="rotateOutUpLeft">rotateOutUpLeft</option>
						<option value="rotateOutUpRight">rotateOutUpRight</option>
						<option value="hinge">hinge</option>
						<option value="rollIn">rollIn</option>
						<option value="rollOut">rollOut</option>
						<option value="zoomIn">zoomIn</option>
						<option value="zoomInDown">zoomInDown</option>
						<option value="zoomInLeft">zoomInLeft</option>
						<option value="zoomInRight">zoomInRight</option>
						<option value="zoomInUp">zoomInUp</option>
						<option value="zoomOut">zoomOut</option>
						<option value="zoomOutDown">zoomOutDown</option>
						<option value="zoomOutLeft">zoomOutLeft</option>
						<option value="zoomOutRight">zoomOutRight</option>
						<option value="zoomOutUp">zoomOutUp</option>
						<option value="slideInDown">slideInDown</option>
						<option value="slideInLeft">slideInLeft</option>
						<option value="slideInRight">slideInRight</option>
						<option value="slideInUp">slideInUp</option>
						<option value="slideOutDown">slideOutDown</option>
						<option value="slideOutLeft">slideOutLeft</option>
						<option value="slideOutRight">slideOutRight</option>
						<option value="slideOutUp">slideOutUp</option>
						
						</select>
						@if ($errors->has('slidereffects'))
						<p class="help-block" style="color:red;">
						 Choose Slider effects
						</p> 
						@endif
                      </div>
					  
                       
                    <div class="col-sm-12"><div class="row">
					  <span id="selected-images"></span>
					  </div>
					  </div>
                    <ul class="jc-slider">
						<li class="jc-animation">
							<img src="{{ asset('/') }}/images/demo.jpg">
						</li>
						
					</ul>
                     
					  <div class="col-sm-12 text-center">
					  @if((isset($addmedia))  && ($addmedia->publish !=''))
					  <input type="hidden" name="addmedia_publish" value="{{ $addmedia->publish }}">
				  <input type="hidden" name="addmedia_post_order" value="{{ $addmedia->post_order }}">
				       @endif
					  <button type="submit" class="btn btn-primary btn-rounded btn-fw">Submit</button>
                     
                      <button type="button" class="btn btn-danger btn-rounded btn-fw">Cancel</button>
					  </div>
                    </form>
                  </div>
				</div>
            </div>	
        </div>			
	</div>
</div>
	
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 <script src="{{ asset('/') }}/js/jquery.jcslider.js"></script>



<script>
$(document).ready(function(){
	$('#slider_effects').on('change', function () {
	
		
		var effect=$('#slider_effects').val();
		
     $('.jc-slider').jcSlider({
            animationIn     : effect,
            animationOut    : effect, 
           
            loop            : true // true by default
        });
	});
		   
  if (window.File && window.FileList && window.FileReader) 
        {
          $(".image-file").on("change", function(e) 
          {
            var file = e.target.files,
            imagefiles = $(".image-file")[0].files;
            var i = 0;
            $.each(imagefiles, function(index, value){
              var f = file[i];
              var fileReader = new FileReader();
              fileReader.onload = (function(e) {

                $('<div class="pip col-sm-3 col-4 boxDiv" align="center" style="margin-bottom: 20px;">' +
                  '<img style="width: 120px; height: 100px;" src="' + e.target.result + '" class="prescriptions">'+
                  '<p class="cross-image remove">Remove</p>'+
                  '<input type="hidden" name="image[]" value="' + e.target.result + '">' +
                  '<input type="hidden" name="sliderimage[]" value="' + value.name + '">' +
                  '</div>').insertAfter("#selected-images");
                  $(".remove").click(function(){
                    $(this).parent(".pip").remove();
                  });
              });
              fileReader.readAsDataURL(f);
              i++;
            });
          });
        } else {
          alert("Your browser doesn't support to File API")
        }
		
		 $('.upload-image').click(function(e){
         var imageDiv = $(".boxDiv").length; 
         if(imageDiv == ''){
           alert('Please upload image'); // Check here image selected or not
           return false;
         }
         else if(imageDiv > 5){
           alert('You can upload only 5 images'); //You can select only 5 images at a time to upload
           return false;
         }
         else if(imageDiv != '' && imageDiv < 6){ // image should not be blank or not greater than 5
            $("#upload_image").submit();
         }
      });
	  
	  
	  
	      
	   
    });
 

</script>
	
	  <style>
.images-preview-div img{
	width:15% !important;
}
.cross-image
{
border: 1px solid;
    border-radius: 99px;
    padding: 5px;
    background: #dc3545;
    color: #fff;
    font-weight: bold;
    font-size: 15px;
}
</style>
	