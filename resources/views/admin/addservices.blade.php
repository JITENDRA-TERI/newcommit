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
		  	@if(session()->has('message'))
						<div class="alert alert-success" id="successmessage">
							{{ session()->get('message') }}
						</div>
				        @endif
                    <h4 class="card-title text-center"><strong>{{ ( (Request::segment(3)=='add-services') ? 'Add' : 'Update') }} Services</strong></h4>
					<hr>
                    @if ( Request::segment(3)=='edit' )
					<form class="forms-sample" action="{{ route('update-service-data',$servicesdata->id)}}" method="post" enctype="multipart/form-data">
					@else 
                    <form class="forms-sample" action="{{ route('store-service-data') }}" method="post" enctype='multipart/form-data'>
				    @endif
					{{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputName1">Services<span style="color:red;">*</span></label>
                      
						<select  name="services" id="services" class="form-control">
						<option value="">--Please Select Services--</option>
						  <optgroup label="Agency">
							<option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Residential Sales') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Residential Sales' ) {{'selected=selected'}} @else {{''}} @endif value="Residential Sales">Residential Sales</option>
							<option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Commercial Investment') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Commercial Investment' ) {{'selected=selected'}} @else {{''}} @endif  value="Commercial Investment">Commercial Investment</option>
						  </optgroup>
						  <optgroup label="Asset Valuation">
							<option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Commercial Valuations') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Commercial Valuations' ) {{'selected=selected'}} @else {{''}} @endif value="Commercial Valuations">Commercial Valuations</option>
							<option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Credit and Legal Assistance') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Credit and Legal Assistance' ) {{'selected=selected'}} @else {{''}} @endif value="Credit and Legal Assistance">Credit and Legal Assistance</option>
						  </optgroup>
						  <optgroup label="Advisory">
							<option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Consulting and Research') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Consulting and Research' ) {{'selected=selected'}} @else {{''}} @endif value="Consulting and Research">Consulting and Research</option>
							<option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Real Estate Consulting') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Real Estate Consulting' ) {{'selected=selected'}} @else {{''}} @endif value="Real Estate Consulting">Real Estate Consulting</option>
							<option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Find the Right investment Project') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Find the Right investment Project' ) {{'selected=selected'}} @else {{''}} @endif value="Find the Right investment Project">Find the Right investment Project</option>
							<option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Residential Valuations') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Residential Valuations' ) {{'selected=selected'}} @else {{''}} @endif value="Residential Valuations">Residential Valuations</option>
						  </optgroup>
						  <option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Bespoke Homes') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Bespoke Homes' ) {{'selected=selected'}} @else {{''}} @endif value="Bespoke Homes">Bespoke Homes</option>
						  <option @if ( isset($servicesdata) && $servicesdata->subcategory == 'Property Tax Rules in Delhi') {{'selected=selected'}} @elseif(old('services') && old('services') == 'Property Tax Rules in Delhi' ) {{'selected=selected'}} @else {{''}} @endif value="Property Tax Rules in Delhi">Property Tax Rules in Delhi</option>
						</select>
						@if ($errors->has('services'))
						<p class="help-block" style="color:red;">
						Please Enter Name
						</p> 
						@endif
                      </div>
                     
                      
                      <div class="form-group">
                        <label for="abstract">Description / Abstract <span style="color:red;">*</span></label>
                         <textarea class="form-control " id="serviceabstract" name="serviceabstract">{{ ( (isset($servicesdata) && $servicesdata->abstract_service !='') ? $servicesdata->abstract_service : old('serviceabstract')) }}</textarea>
						@if ($errors->has('serviceabstract'))
						<p class="help-block" style="color:red;">
						Please Enter Abstract
						</p> 
						@endif
                      </div>
					  
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="serviceimage" class="form-control" id="fileInput">
                         @if( (isset($servicesdata)) && ($servicesdata->service_image !='') )
							<img src="{{ asset('/') }}/public/service_image/{{$servicesdata->service_image}}" style="width:30%;">
						     <input type="hidden" name="oldserviceimage" value="{{$servicesdata->service_image}}">
						@endif
                      </div>
                   
                     
					  <div class="col-sm-12 text-center">
					   @if((isset($servicesdata))  && ($servicesdata->publish !=''))
					  <input type="hidden" name="service_publish" value="{{ $servicesdata->publish }}">
				
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'serviceabstract' );
</script>
	  @extends('layouts.admin-footer')	