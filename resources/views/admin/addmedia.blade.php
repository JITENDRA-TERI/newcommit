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
                    <h4 class="card-title text-center"><strong>{{ ( (Request::segment(3)=='add-media') ? 'Add' : 'Update') }} Media</strong></h4>
					 @if(session()->has('message'))
						<div class="alert alert-success" id="successmessage">
							{{ session()->get('message') }}
						</div>
				        @endif
					<hr>
                     @if ( Request::segment(3)=='edit' )
					<form class="forms-sample" action="{{ route('update-media-data',$addmedia->id)}}" method="post" enctype="multipart/form-data">
					@else 
                    <form class="forms-sample" action="{{ route('store-media-data') }}" method="post">
				    @endif
					{{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputName1">Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="post_title"
						value="{{ ( (isset($addmedia) && $addmedia->title!='') ? $addmedia->title : old('post_title')) }}">
						@if ($errors->has('post_title'))
						<p class="help-block" style="color:red;">
						Please Enter Post Title
						</p> 
						@endif
                      </div>
					  
					    <div class="form-group">
                        <label for="exampleInputName1">Author </label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="author_name"
						value="{{ ( (isset($addmedia) && $addmedia->author!='') ? $addmedia->author : old('author_name')) }}">
						
                      </div>
					  <div class="form-group">
                        <label for="exampleInputName1">Select Post Date <span style="color:red;">*</span></label>
                        <input type="date" class="form-control" id="exampleInputName1" placeholder="Name" name="post_date"
						value="{{ ((isset($addmedia) && $addmedia->post_date !='') ? date('Y-m-d',strtotime($addmedia->post_date)) : old('post_date')) }}">
						@if ($errors->has('post_date'))
						<p class="help-block" style="color:red;">
						Please Enter Post Date
						</p> 
						@endif
                      </div>
                     
                      
                      <div class="form-group">
                        <label for="abstract">Description / Abstract <span style="color:red;">*</span></label>
                         <textarea class="form-control " id="serviceabstract" name="serviceabstract">{{ ( (isset($addmedia) && $addmedia->abstract_data!='') ? $addmedia->abstract_data : old('serviceabstract')) }}</textarea>
						@if ($errors->has('serviceabstract'))
						<p class="help-block" style="color:red;">
						Please Enter Abstract
						</p> 
						@endif
                      </div>
					  
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="serviceimage" class="form-control" id="fileInput">
                         @if( (isset($addmedia)) && ($addmedia->post_image !='') )
							<img src="{{ asset('/') }}public/media_image/{{$addmedia->post_image}}" style="width:30%;">
						     <input type="hidden" name="oldmediaimage" value="{{$addmedia->post_image}}">
						@endif
                      </div>
                   
                     
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'serviceabstract' );
</script>
	  @extends('layouts.admin-footer')	