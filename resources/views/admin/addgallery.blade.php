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
                    <h4 class="card-title text-center"><strong>{{ ( (Request::segment(3)=='add-gallery-image') ? 'Add' : 'Update') }} Gallery</strong></h4>
					<hr>
					  @if ( Request::segment(3)=='edit' )
					  
                             <form method='post' action="{{ route('update-image-data',$gallerydata->id)}}" enctype='multipart/form-data'>
					  
					  @else 
						   <form method='post' action="{{ route('store-gallery-image') }}" enctype='multipart/form-data'>
					  
					  @endif
						{{ csrf_field() }}
						@if(!isset($gallerydata))
                      <div class="form-group">
                        <label for="gallery_title">Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="gallery_title" placeholder="Name" name="gallery_title">
						@if ($errors->has('gallery_title'))
						<p class="help-block" style="color:red;">
						Please Enter title
						</p> 
						@endif
                      </div>
					  @endif
					  @if(isset($gallerydata))
						  <input type="file" name="updatedimage" accept=".jpg,.jpeg,.JPEG,.JPG,.PNG,.png">
					        
							<img src="{{ asset('/') }}/public/gallery_images/{{ $gallerydata->image_name }}">
						    <input type="hidden" name="oldgalleryimage" value="{{ $gallerydata->image_name }}"><br>
							
							 <input type="hidden" name="gallery_publish" value="{{ $gallerydata->publish }}"><br>
							 <button type="submit" class="btn btn-primary btn-rounded btn-fw">Submit</button>
					  @else	  
					<table id="table" width="50%">
					<thead>
					
					</thead>
					<tbody>
					<tr class="add_row">
					<td id="no" width="5%">#</td>
					<td width="75%"><input class="file" name='gallerimages[]' type='file' multiple /></td>
					<td width="20%"></td>
					</tr>
					</tbody>
					<tfoot>
					<tr>
					<td colspan="4">
					  <button class="btn btn-success btn-sm" type="button" id="add" title='Add new file'/>Add new file</button>
					</td>
					</tr>
					<tr class="last_row">
					<td colspan="4" style="text-align:center;">
					    <button type="submit" class="btn btn-primary btn-rounded btn-fw">Submit</button>
                     
                      <button type="button" class="btn btn-danger btn-rounded btn-fw">Cancel</button>
					</td>
					</tr>
					</tfoot>
					</table>
					@endif
					</form>
									
                  </div>
				</div>
            </div>	
        </div>			
	</div>
</div>

	  @extends('layouts.admin-footer')	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  <script>
$(document).ready(function(){

 
			
   // Append/Add new row
   $('#table').on('click', "#add", function(e) {
    $('tbody').append('<tr class="add_row"><td>#</td><td><input name="gallerimages[]" type="file" class="file" multiple /></td><td class="text-center"><button type="button"  class="btn btn-danger btn-sm" id="delete" title="Delete file">Delete file</button></td><tr>');
	e.preventDefault();
   });
			
   // Delete row
   $('#table').on('click', "#delete", function(e) {
	if (!confirm("Are you sure you want to delete this file?"))
	return false;
	$(this).closest('tr').remove();
	e.preventDefault();
   });
});
</script>

  <style>
	body{ font-family:sans-serif; }
	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	.success{ color: green;}
	.danger{ color: red;}
   </style>