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
                    <h4 class="card-title text-center"><strong>Add About Us </strong></h4>
					<hr>
                    
                    <form class="forms-sample" action="@if($getdata->abstract_about !='') {{  route('update-aboutus-data') }} @else {{ route('store-aboutus-data') }} @endif" method="post">
					{{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputName1">Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="about_title" value="ABOUT US" readonly>
						
                      </div>
					  
					   
					
                     
                      
                      <div class="form-group">
                        <label for="abstract">Description / Abstract <span style="color:red;">*</span></label>
                         <textarea class="form-control " id="aboutabstract" name="aboutabstract">@if(isset($getdata) && ($getdata->abstract_about !='')){{$getdata->abstract_about}} @else{{ '' }}@endif</textarea>
						@if ($errors->has('aboutabstract'))
						<p class="help-block" style="color:red;">
						Please Enter Abstract
						</p> 
						@endif
                      </div>
					  
                      
                   
                     
					  <div class="col-sm-12 text-center">
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
CKEDITOR.replace( 'aboutabstract' );
</script>
	  @extends('layouts.admin-footer')	