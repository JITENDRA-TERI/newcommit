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
		  
                    <h4 class="card-title text-center"><strong>{{ ( (Request::segment(2)=='add-testimonials') ? 'Add' : 'Update') }} Testimonial</strong></h4>
					<hr>
                    @if ( Request::segment(3)=='edit' )
					<form class="forms-sample" action="{{ route('update-testimonial-data',$edittestimonial->id)}}" method="post" enctype="multipart/form-data">
					@else 
                    <form class="forms-sample" action="{{ route('store-testimonial-data') }}" method="post" enctype="multipart/form-data">
				    @endif
					{{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputName1">Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="person_name"
						value="{{ ( (isset($edittestimonial) && $edittestimonial->name!='') ? $edittestimonial->name : old('person_name')) }}">
						@if ($errors->has('person_name'))
						<p class="help-block" style="color:red;">
						Please Enter Name
						</p> 
						@endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email_id"
						value="{{ ( (isset($edittestimonial) && $edittestimonial->email !='') ? $edittestimonial->email  : old('email_id') ) }}">
                      </div>
                      <div class="form-group">
                        <label for="contact_number">Conatct Number</label>
                        <input type="text" class="form-control" id="contact_number" placeholder="Contact Number" name="contact_no"
						value="{{ ( (isset($edittestimonial) && $edittestimonial->contact_no !='') ? $edittestimonial->contact_no  : old('contact_no') ) }}">
                      </div>
                      <div class="form-group">
                        <label for="abstract">Description / Abstract <span style="color:red;">*</span></label>
                        <textarea  class="form-control" name="abstract" id="abstract"  rows="4">{{ ( (isset($edittestimonial) && $edittestimonial->description !='') ? $edittestimonial->description  : old('abstract') ) }}</textarea>
						@if ($errors->has('abstract'))
						<p class="help-block" style="color:red;">
						Please Enter Abstract
						</p> 
						@endif
                      </div>
					    <div class="form-group">
                        <label for="company_name">Company<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="company_name" placeholder="Company Name" name="company_name" value="{{ ( (isset($edittestimonial) && $edittestimonial->company_name !='') ? $edittestimonial->company_name  : old('company_name') ) }}">
						@if ($errors->has('company_name'))
						<p class="help-block" style="color:red;">
					     Please Enter Company Name
						</p> 
						@endif
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="imgupload" class="form-control" id="fileInput" accept="image/x-png,image/jpg,image/jpeg">
                        @if( (isset($edittestimonial)) && ($edittestimonial->images !='') )
							<img src="{{ asset('/') }}/public/testimonial_image/{{$edittestimonial->images}}" style="width:30%;">
						     <input type="hidden" name="oldtestimonialimage" value="{{$edittestimonial->images}}">
						@endif
                      </div>
                   
                     
					  <div class="col-sm-12 text-center">
					   @if((isset($edittestimonial))  && ($edittestimonial->publish !=''))
					  <input type="hidden" name="testimonial_publish" value="{{ $edittestimonial->publish }}">
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

	  @extends('layouts.admin-footer')	