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
					    <div class="col-sm-8" style="margin-top:20px;">
						   <h4 class="card-title">Property Listing</h4>
						</div>
						<div class="col-sm-4">
						   <button type="button" class="btn btn-dark btn-rounded btn-fw">
						   <i class="icon-plus">
						   <a href="{{ route('add-property-listing') }}">Add Property Listing</a></i></button>
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
                          <th> Property Type </th>
                          <th> Property City </th>
                          <th> Property Status </th>
						  <th> Property Price </th>
						  <th> Featured Property </th>
                          <th> Actions </th>
                        </tr>
                      </thead>
                      <tbody>
					   @if(isset($propertylisting))
					   @php $i=0; @endphp
				      
					   @foreach ($propertylisting as $bl)
                        <tr>
                          <td class="py-1">
                           {{ $i+1+(( ( (isset($_GET['page'])) ? $_GET['page'] : 1 )-1)*10) }}
                          </td>
                          <td> {{ ucfirst($bl->property_type) }}</td>
                          <td> {{ ucfirst($bl->property_city) }} </td>
						  <td> {{ ucfirst($bl->property_status) }} </td>
						  <td> {{ ucfirst($bl->property_price) }} </td>
						  <td><input class="star" type="checkbox" title="featured property" onclick="featuredproperty({{$bl->id}})" id="featuredproperty_{{$bl->id}}" @if($bl->featured_property == 1) {{ 'checked' }} @endif><br/><br/></td>
						  <td><a href="listing-properties/edit/{{ $bl->id }}"><button type="button" class="btn btn-primary btn-rounded btn-icon">
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
					@if( count($propertylisting)==0 )
							<div class="alert alert-info text-center col-12 nextRw">No records found</div>
	                @endif
			        @if(count($propertylisting) > 0)
					{!! $propertylisting->render() !!}
				    @endif
                  </div>
                </div>
              </div>
		</div>
</div>
</div>
</div>		

	  @extends('layouts.admin-footer')
	  <style>
	  .star {
    visibility:hidden;
    font-size:30px;
    cursor:pointer;
}
.star:before {
   content: "\2606";
   position: absolute;
   visibility:visible;
}
.star:checked:before {
   content: "\2605";
   position: absolute;
       color: darkgoldenrod;
}
</style>
<script>
function featuredproperty(eid)
{
	
	var csrf = $('meta[name="csrf-token"]').attr('content');
	if($("#featuredproperty_"+eid).is(':checked'))
	 {
		var checkval='1';
	}
	else
	{
		var checkval='0';
	}
	
	
	$.ajax({
    url: './listing-properties/featured-property/'+eid,
    type: 'POST',
    data: {'id' : eid, 'check_featured':checkval, '_token': csrf},
    

    success: function( data ) {
        
			setTimeout(function(){
           window.location.reload(); 
        }, 1000);
		

    }       
});
}
</script>