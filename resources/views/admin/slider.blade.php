   @extends('layouts.admin-header')
<div class="container-scroller">
@extends('layouts.dashboardhead')
     <div class="container-fluid page-body-wrapper">
      @yield('content')
		  @include('layouts.sidebar-admin')
        <div class="main-panel">
          <div class="content-wrapper">
   
               <div class="col-lg-12 grid-margin stretch-card" style="margin-top:20px;">
                <div class="card">
                  <div class="card-body">
				  <div class="col-sm-12" style="margin-bottom:20px;">
				     <div class="row">
					    <div class="col-sm-9" style="margin-top:20px;">
						   <h4 class="card-title">Slider Section</h4>
						</div>
						<div class="col-sm-3">
						   <button type="button" class="btn btn-dark btn-rounded btn-fw">
						   <i class="icon-plus">
						   <a href="{{ route('add-slider') }}">Add Slider</a></i></button>
						</div>
					</div>
				  </div>
				    @if(session()->has('message'))
						<div class="alert alert-success" id="successmessage">
							{{ session()->get('message') }}
						</div>
				    @endif
                   
                    <table class="table table-striped">
                      <thead>
                        <tr style="background-color: #3e4b5b; color: #fff;">
                          <th> S.NO </th>
                         
						  <th>Images</th>
                          <th> Publish </th> 
						  <th> Actions </th>
                        </tr>
                      </thead>
                      <tbody id="media-table">
					   @if(isset($sliders))
					   @php $i=0; @endphp
					   @foreach ($sliders as $bl)
					   
					    
                        <tr id="{{ $bl->id }}">
                          <td class="py-1">
                           {{ $i+1+(( ( (isset($_GET['page'])) ? $_GET['page'] : 1 )-1)*10) }}
                          </td>
                          <td>
						 <img src="{{ asset('/') }}/public/slider_images/{{$bl->slider_images}}" style="width:20%; height:30%; border-radius:1%;">
						</td>
                          <td> <div class="form-check text-center">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" >  </label>
                            </div> </td>
						
						  <td> <a href="gallery/edit/{{ $bl->id }}"><button type="button" class="btn btn-primary btn-rounded btn-icon">
                            <i class="fa fa-pencil"></i>
                          </button></a>
						  <button type="button" class="btn btn-danger btn-rounded btn-icon">
                            <i class="fa fa-trash-o"></i>
                          </button> </td>
                        </tr>
						 @php $i++; @endphp
					     @endforeach
					     @endif
                       </tbody>
                    </table>
					@if( count($sliders)==0 )
							<div class="alert alert-info text-center col-12 nextRw">No records found</div>
	                @endif
			        @if(count($sliders) > 0)
					{!! $sliders->render() !!}
				    @endif
                  </div>
                </div>
              </div>
		</div>
</div>
</div>
</div>		

	  @extends('layouts.admin-footer')
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	  <script>
	  $(document).ready(function(){
		  $('[data-toggle="tooltip"]').tooltip();
		});
	 $( "#media-table" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('#media-table>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });


    function updateOrder(data) {
		console.log(data);
	var csrf = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
    url: './media/featured-post',
    type: 'POST',
	data:{'position':data, '_token': csrf},
    
    

    success: function( data ) {
        
			setTimeout(function(){
          // window.location.reload(); 
        }, 1000);
		

    }       
});
    }
</script>
	  
	  <style>
	  .star-rating {
  
  display:flex;
  margin-top:10px;
  font-size:1.5em;
  text-align:center;
  width:5em;
}

.star-rating input {
  display:none;
}

.star-rating label {
  color:#ccc;
  cursor:pointer;
}

.star-rating :checked ~ label {
  color:#f90;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
  color:#fc0;
}

/* explanation */

.form-check {
    
    margin-top: -5px !important;
   
}
</style>