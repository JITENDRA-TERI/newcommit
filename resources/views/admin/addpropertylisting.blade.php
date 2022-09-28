@extends('layouts.admin-header')
 
<div class="container-scroller">
@extends('layouts.dashboardhead')
    <div class="container-fluid page-body-wrapper">
      @yield('content')
		  @include('layouts.sidebar-admin')
		  <div class="main-panel">
          <div class="content-wrapper">
   
          <div class="col-lg-12 grid-margin stretch-card" style="margin-top:20px;">
		  <div class="card-body">
		  
                    <h4 class="card-title text-center"><strong>{{ ( (Request::segment(3)=='add-property-listing') ? 'Add' : 'Update') }}  Property Listing</strong></h4>
					<hr>
                    @if ( Request::segment(3)=='edit' )
					<form class="forms-sample" action="{{ route('update-listing-data',$listingdata->id)}}" method="post" enctype="multipart/form-data">
				    <input type="hidden" value="{{ $listingdata->id }}" id="currentids">
					@else 
                    <form class="forms-sample" action="{{ route('store-listing-property') }}" method="post" enctype="multipart/form-data">
				   @endif
					{{ csrf_field() }}
					 <div class="form-group">
                        <label for="property_price">Property Title<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="property_title" placeholder="Property Title" name="property_title"
						value="{{ ( (isset($listingdata) && $listingdata->property_title!='') ? $listingdata->property_title : old('property_title')) }}">
						
							@if ($errors->has('property_title'))
						<p class="help-block" style="color:red;">
						Enter property Title
						</p> 
						@endif
					  </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Property Type <span style="color:red;">*</span></label>
                       <select id="select-type" placeholder="Pick Property Type" name="property_type">
						<option value="">Select Property Type...</option>
						<option @if ( isset($listingdata) && $listingdata->property_type == 'Bunglow') {{'selected=selected'}} @elseif(old('property_type') && old('property_type') == 'Bunglow' ) {{'selected=selected'}} @else {{''}} @endif value="Bunglow">Bunglow</option>
						<option @if ( isset($listingdata) && $listingdata->property_type == 'Commercial') {{'selected=selected'}} @elseif(old('property_type') && old('property_type') == 'Commercial' ) {{'selected=selected'}} @else {{''}} @endif  value="Commercial">Commercial</option>
						<option @if ( isset($listingdata) && $listingdata->property_type == 'farm_house') {{'selected=selected'}} @elseif(old('property_type') && old('property_type') == 'farm_house' ) {{'selected=selected'}} @else {{''}} @endif  value="farm_house" >Farm House</option>
						<option @if ( isset($listingdata) && $listingdata->property_type == 'houses') {{'selected=selected'}} @elseif(old('property_type') && old('property_type') == 'houses' ) {{'selected=selected'}} @else {{''}} @endif   value="houses">Houses</option>
						<option @if ( isset($listingdata) && $listingdata->property_type == 'office') {{'selected=selected'}} @elseif(old('property_type') && old('property_type') == 'office' ) {{'selected=selected'}} @else {{''}} @endif value="office">Office</option>
						<option @if ( isset($listingdata) && $listingdata->property_type == 'Residential') {{'selected=selected'}} @elseif(old('property_type') && old('property_type') == 'Residential' ) {{'selected=selected'}} @else {{''}} @endif  value="Residential">Residential</option>
						<option @if ( isset($listingdata) && $listingdata->property_type == 'apartments') {{'selected=selected'}} @elseif(old('property_type') && old('property_type') == 'apartments' ) {{'selected=selected'}} @else {{''}} @endif value="apartments">--Apartment</option>
						
					  </select>
						@if ($errors->has('property_type'))
						<p class="help-block" style="color:red;">
						Select property type
						</p> 
						@endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Property City <span style="color:red;">*</span></label>
                        <select id="select-city" placeholder="Pick Property City" name="property_city">
						<option value="">Select Property City...</option>
						<option @if ( isset($listingdata) && $listingdata->property_city == 'Lutyens Delhi') {{'selected=selected'}} @elseif(old('property_city') && old('property_city') == 'Lutyens Delhi' ) {{'selected=selected'}} @else {{''}} @endif value="Lutyens Delhi">Lutyens Delhi</option>
						<option @if ( isset($listingdata) && $listingdata->property_city == 'Gurgoan') {{'selected=selected'}} @elseif(old('property_city') && old('property_city') == 'Gurgoan' ) {{'selected=selected'}} @else {{''}} @endif  value="Gurgoan">Gurgoan</option>
						<option @if ( isset($listingdata) && $listingdata->property_city == 'Centeral Delhi') {{'selected=selected'}} @elseif(old('property_city') && old('property_city') == 'Centeral Delhi' ) {{'selected=selected'}} @else {{''}} @endif value="Centeral Delhi">Centeral Delhi</option>
						<option @if ( isset($listingdata) && $listingdata->property_city == 'South Delhi') {{'selected=selected'}} @elseif(old('property_city') && old('property_city') == 'South Delhi' ) {{'selected=selected'}} @else {{''}} @endif  value="South Delhi">South Delhi</option>
						
						
					  </select>
						@if ($errors->has('property_city'))
						<p class="help-block" style="color:red;">
						Select property City
						</p> 
						@endif
                      </div>
                         <div class="form-group">
                        <label for="exampleInputName1">Property Status <span style="color:red;">*</span></label>
                        <select id="property_status" class="form-control"  placeholder="Pick Property Status" name="property_status">
						<option value="">Select Property Status...</option>
						<option @if ( isset($listingdata) && $listingdata->property_status == 'Sold') {{'selected=selected'}} @elseif(old('property_status') && old('property_status') == 'Sold' ) {{'selected=selected'}} @else {{''}} @endif  value="Sold">Sold</option>
						<option @if ( isset($listingdata) && $listingdata->property_status == 'Rent') {{'selected=selected'}} @elseif(old('property_status') && old('property_status') == 'Rent' ) {{'selected=selected'}} @else {{''}} @endif value="Rent">Rent</option>
						</select>
						@if ($errors->has('property_status'))
						<p class="help-block" style="color:red;">
						Select property Status
						</p> 
						@endif
                      </div>
                      <div class="form-group">
                        <label for="amenities">Amenities </label><br> 
                            <div class="col-sm-12">	
                              <div class="row">	
							  @if(isset($listingdata))
							      @php
							 
								  $amdata=explode(",",$listingdata->property_ammities);
								  @endphp
								  @endif
                                     <div class="col-sm-4">							  
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Gym',
									 $amdata	))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Gym' ) {{'checked'}} @else {{''}} @endif value="Gym" />    
									 <label style="line-height:1.5;">Gym</label> <br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('wifi',
									 $amdata	))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'wifi' ) {{'checked'}} @else {{''}} @endif value="wifi" />    
									 <label style="line-height:1.5;">Wifi</label> <br>	
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('swimming pool',$amdata	))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'swimming pool' ) {{'checked'}} @else {{''}} @endif  value="swimming pool" />    
									 <label style="line-height:1.5;">Swimming Pool</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Sprinkler',
									 $amdata	))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Sprinkler' ) {{'checked'}} @else {{''}} @endif value="Sprinkler" />    
									 <label style="line-height:1.5;">Sprinkler</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Gas Heat',
									 $amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Gas Heat' ) {{'checked'}} @else {{''}} @endif value="Gas Heat" />    
									 <label style="line-height:1.5;">Gas Heat</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Celling Fans',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Celling Fans' ) {{'checked'}} @else {{''}} @endif value="Celling Fans" />    
									 <label style="line-height:1.5;">Celling Fans</label> 	<br>
									 </div>
									  <div class="col-sm-4">							  
									 <input type="checkbox" id="" name="amenities[]" value="Pool"  @if (( isset($listingdata)) && (in_array('Pool',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Pool' ) {{'checked'}} @else {{''}} @endif />    
									 <label style="line-height:1.5;">Pool</label> <br>
									 <input type="checkbox" id="" name="amenities[]"  @if (( isset($listingdata)) && (in_array('Laundry Rooms',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Laundry Rooms' ) {{'checked'}} @else {{''}} @endif value="Laundry Rooms" />    
									 <label style="line-height:1.5;">Laundry Rooms</label> <br>	
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Backyards',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Backyards' ) {{'checked'}} @else {{''}} @endif  value="Backyards" />    
									 <label style="line-height:1.5;">Backyards</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Washer',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Washer' ) {{'checked'}} @else {{''}} @endif value="Washer" />    
									 <label style="line-height:1.5;">Washers</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('storage',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'storage' ) {{'checked'}} @else {{''}} @endif value="storage" />    
									 <label style="line-height:1.5;">Storage</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Dryer',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Dryer' ) {{'checked'}} @else {{''}} @endif value="Dryer" />    
									 <label style="line-height:1.5;">Dryer</label> 	<br>
									 </div>
									  <div class="col-sm-4">							  
									 <input type="checkbox" id="" name="amenities[]"  @if (( isset($listingdata)) && (in_array('Fully Furnished',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Fully Furnished' ) {{'checked'}} @else {{''}} @endif value="Fully Furnished" />    
									 <label style="line-height:1.5;">Fully Furnished</label> <br>
									 <input type="checkbox" id="" name="amenities[]" value="balcony" @if (( isset($listingdata)) && (in_array('balcony',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'balcony' ) {{'checked'}} @else {{''}} @endif />    
									 <label style="line-height:1.5;">Balcony</label> <br>	
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Fire Alarms',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Fire Alarms' ) {{'checked'}} @else {{''}} @endif value="Fire Alarms" />    
									 <label style="line-height:1.5;">Fire Alarms</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Home Theater',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Home Theater' ) {{'checked'}} @else {{''}} @endif value="Home Theater" />    
									 <label style="line-height:1.5;">Home Theater</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]"  @if (( isset($listingdata)) && (in_array('Ocean View',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Ocean View' ) {{'checked'}} @else {{''}} @endif value="Ocean View" />    
									 <label style="line-height:1.5;">Ocean View</label> 	<br>
									 <input type="checkbox" id="" name="amenities[]" @if (( isset($listingdata)) && (in_array('Air Conditions',$amdata))) {{'checked'}} @elseif(old('amenities') && old('amenities') == 'Air Conditions' ) {{'checked'}} @else {{''}} @endif value="Air Conditions" />    
									 <label style="line-height:1.5;">Air Conditions</label> 	<br>
									 </div>
                            </div>							 
                            </div>							 
						
                      </div>
					    <div class="form-group">
                        <label for="property_price">Property Price</label>
                        <input type="text" class="form-control" id="property_price" placeholder="Property Price" name="property_price"
						value="{{ ( (isset($listingdata) && $listingdata->property_price!='') ? $listingdata->property_price : old('property_price')) }}">
						@if ($errors->has('property_price'))
						<p class="help-block" style="color:red;">
					     Please Enter property price
						</p> 
						@endif
                      </div>
					   <div class="form-group">
                        <label for="property_price">Number of Bedrooms</label>
                        <input type="text" class="form-control" id="no_of_bedrooms" placeholder="No Of Bedrooms" name="no_of_bedrooms"
						value="{{ ( (isset($listingdata) && $listingdata->bedrooms!='') ? $listingdata->bedrooms : old('no_of_bedrooms')) }}">
					  </div>
					  <div class="form-group">
                        <label for="property_price">Number of Bathrooms</label>
                        <input type="text" class="form-control" id="no_of_bathrooms" placeholder="No Of Bathrooms" name="no_of_bathrooms"
						value="{{ ( (isset($listingdata) && $listingdata->bathroom!='') ? $listingdata->bathroom : old('no_of_bathrooms')) }}">
					  </div>
					  <div class="form-group">
                        <label for="property_price">Property Area</label>
                        <input type="text" class="form-control" id="property_area" placeholder="Property Area" name="property_area" 
						value="{{ ( (isset($listingdata) && $listingdata->property_area !='') ? $listingdata->property_area : old('property_area')) }}">
					  </div>
					  <div class="form-group">
                        <label for="property_price">Property Locality</label>
                        <input type="text" class="form-control" id="property_locality" placeholder="Property Locality" name="property_locality" value="{{ ( (isset($listingdata) && $listingdata->property_location !='') ? $listingdata->property_location : old('property_location')) }}">
					  </div>
					  <div class="form-group">
                        <label for="property_price">Property Built Up</label>
                        <input type="text" class="form-control" id="property_builtup" placeholder="Property Built Up" name="property_builtup"value="{{ ( (isset($listingdata) && $listingdata->property_built_up !='') ? $listingdata->property_built_up : old('property_built_up')) }}">
					  </div>
					   <div class="form-group">
                        <label for="property_price">Property Face</label>
                        <input type="text" class="form-control" id="property_face" placeholder="Property Face" name="property_face"
						value="{{ ( (isset($listingdata) && $listingdata->property_face !='') ? $listingdata->property_face : old('property_face')) }}">
					  </div>
					   <div class="form-group">
                        <input type="checkbox" id="superprime" name="superprime" value='yes' @if (( isset($listingdata)) && ($listingdata->super_prime_banglow == 'yes'))) {{'checked'}} @elseif(old('superprime') && old('superprime') == 'yes' ) {{'checked'}} @else {{''}} @endif/>    
						<label style="line-height:1.5;">Super Prime Bunglow</label> <br>
					  </div>
					  <div class="form-group">
                        <label for="property_price">Rare options</label>
                        <input type="text" class="form-control" id="rare_options" placeholder="Rare Options" name="rare_options"
						value="{{ ( (isset($listingdata) && $listingdata->rare_option !='') ? $listingdata->rare_option : old('rare_options')) }}">
					  </div>
					  <div class="form-group">
                        <label for="property_price">Property Description</label>
                        <textarea class="form-control" name="property_description">{{ ( (isset($listingdata) && $listingdata->property_description !='') ? $listingdata->property_description : old('property_description')) }}</textarea>
					  </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="imgupload[]" class="form-control image-file" id="imageUpload" accept="image/x-png,image/gif,image/jpeg" multiple="multiple">
                        <span style="font-size: 11px;color: red;">(max. upto 5  images of upto 5 mb each format: JPEG, JPG, PNG)</span>
							<div class="row" style="margin-top: 20px;">
							<span id="selected-images"></span>
						</div>
						@if(isset($listingdata))
							<?php
							$countdata=count($listingdata->property_attachment);?>
							
							<div class="col-sm-12">
							<div class="row">
						    <?php
							for ($i=0; $i<$countdata ; $i++) {?>
						   
							<div class="col-sm-3" align="center" id="removeimagediv_<?php echo $listingdata->property_attachment[$i]->id; ?>">
							<img src="{{ asset('/') }}public/property_photos/<?php echo $listingdata->property_attachment[$i]->attachment_path;?>" style="width: 120px; height: 100px; margin-bottom: 20px;";>
							
							<p class="" onclick="removeimages('<?php echo $listingdata->property_attachment[$i]->id; ?>')" style ="border: 1px solid; border-radius: 99px; padding: 5px; background: #dc3545 !important; color: #fff !important;font-weight: bold;font-size: 15px;">Remove</p>
							</div>
							<?php }?>
							</div>
						   </div>
						@endif	
					
                      </div>
                   
                     
					  <div class="col-sm-12 text-center">
					  <button type="submit" class="btn btn-primary btn-rounded btn-fw">Submit</button>
					  @if(isset($listingdata))
					  <input type="hidden" name="listing_publish" value="{{ $listingdata->publish }}">
				      @endif
                     
                      <button type="button" class="btn btn-danger btn-rounded btn-fw">Cancel</button>
					  </div>
                    </form>
                  </div>
				</div>
            </div>	
        </div>			
	</div>
</div>
  
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <script>
  CKEDITOR.replace( 'property_description' );
  
function removeimages(did)
{
	var csrf = $('meta[name="csrf-token"]').attr('content');
	var currentids=$('#currentids').val();
	console.log(currentids);
	if (confirm('Are you sure you want to delete book data')) {
		$.ajax({
    url: 'confirm-delete/'+did,
    type: 'POST',
    data: {'attach_id' : did, '_token': csrf},
   

    success: function( data ) {
        location.reload(); 
       }       
     });
	}
	
}
    $(document).ready(function () {
		$('#removeimage').click(function()
		{
		});
      $('#select-type').selectize({
          
      });
	  
	  
	   $('#select-city').selectize({
          
      });
	   $('#property_status').selectize({
          
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
                  '<input type="hidden" name="imageName[]" value="' + value.name + '">' +
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
	
	  

	