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
						   <h4 class="card-title">Services</h4>
						</div>
						<div class="col-sm-3">
						   <button type="button" class="btn btn-dark btn-rounded btn-fw">
						   <i class="icon-plus">
						   <a href="{{ route('add-services') }}">Add Services</a></i></button>
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
                         
                          <th> Category </th>
                          <th> SubCategory </th>
                          <th> Actions </th>
                        </tr>
                      </thead>
                      <tbody>
					   @if(isset($getservices))
					   @php $i=0; @endphp
				      
					   @foreach ($getservices as $bl)
                        <tr>
                          <td class="py-1">
                           {{ $i+1+(( ( (isset($_GET['page'])) ? $_GET['page'] : 1 )-1)*10) }}
                          </td>
                          <td> @if($bl->category =='' ) {{ '-' }}@else {{ $bl->category }} @endif</td>
                          <td> {{ $bl->subcategory }} </td>
						  
						  <td> <a href="Services/edit/{{ $bl->id }}"><button type="button" class="btn btn-primary btn-rounded btn-icon">
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
					@if( count($getservices)==0 )
							<div class="alert alert-info text-center col-12 nextRw">No records found</div>
	                @endif
			        @if(count($getservices) > 0)
					{!! $getservices->render() !!}
				    @endif
                  </div>
                </div>
              </div>
		</div>
</div>
</div>
</div>		

	  @extends('layouts.admin-footer')