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
                    <h4 class="card-title text-center"><strong>{{ ( (Request::segment(3)=='add-teams-member') ? 'Add' : 'Update') }} Team Members</strong></h4>
					<hr>
					@if(session()->has('message'))
						<div class="alert alert-success" id="successmessage">
							{{ session()->get('message') }}
						</div>
				        @endif
                     @if ( Request::segment(3)=='edit' )
					<form class="forms-sample" action="{{ route('update-team-data',$teamsdata->id)}}" method="post" enctype="multipart/form-data">
					@else 
                    <form class="forms-sample" action="{{ route('store-team-members') }}" method="post" enctype="multipart/form-data">
				    @endif
					{{ csrf_field() }}
                      <div class="form-group">
                        <label for="member_name">Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="member_name" placeholder="Name" name="member_name"
						value="{{ ( (isset($teamsdata) && $teamsdata->member_name!='') ? $teamsdata->member_name : old('member_name')) }}">
						@if ($errors->has('member_name'))
						<p class="help-block" style="color:red;">
						Please Enter Name
						</p> 
						@endif
                      </div>
					   <div class="form-group">
                        <label for="member_name">Designation </label>
                        <input type="text" class="form-control" id="member_designation" placeholder="Designation" name="member_designation"
						value="{{ ( (isset($teamsdata) && $teamsdata->designation!='') ? $teamsdata->designation : old('member_designation')) }}">
						
					
                      </div>
                      <div class="form-group">
                        <label for="member_email_id">Email address</label>
                        <input type="email" class="form-control" id="member_email_id" placeholder="Email" name="member_email_id"
						value="{{ ( (isset($teamsdata) && $teamsdata->member_email!='') ? $teamsdata->member_email : old('member_email_id')) }}">
                      </div>
                      <div class="form-group">
                        <label for="member_contact_no">Conatct Number</label>
                        <input type="text" class="form-control" id="member_contact_no" placeholder="Contact Number" name="member_contact_no"
						value="{{ ( (isset($teamsdata) && $teamsdata->member_contact_no!='') ? $teamsdata->member_contact_no : old('member_contact_no')) }}">
                      </div>
                      <div class="form-group">
                        <label for="member_abstract">Description / Abstract </label>
                        <textarea  class="form-control" name="member_abstract" id="member_abstract"  rows="4">{{ ( (isset($teamsdata) && $teamsdata->short_description!='') ? $teamsdata->short_description : old('member_abstract')) }}</textarea>
						
                      </div>
					    <div class="form-group">
                        <label for="company_name">Member Company</label>
                        <input type="text" class="form-control" id="member_company_name" placeholder="Company Name" name="member_company_name" value="{{ ( (isset($teamsdata) && $teamsdata->company_name!='') ? $teamsdata->company_name : old('member_company_name')) }}">
						</div>
						<div class="form-group">
                        <label for="company_name">Facebook Url</label>
                        <input type="text" class="form-control socialurl" onblur="checkurl()" id="facebook_url" placeholder="Facebook url" name="facebook_url" value="{{ ( (isset($teamsdata) && $teamsdata->fb_link!='') ? $teamsdata->fb_link : old('facebook_url')) }}">
						</div>
						<div class="form-group">
                        <label for="company_name">Linkdin Url</label>
                        <input type="text" class="form-control socialurl" onblur="checkurl()" id="linkdin_url" placeholder="Linkdin Url"  name="linkdin_url" value="{{ ( (isset($teamsdata) && $teamsdata->linkndin_link!='') ? $teamsdata->linkndin_link : old('linkdin_url')) }}">
						</div>
						<div class="form-group">
                        <label for="company_name">Twitter Url</label>
                        <input type="text" class="form-control socialurl" onblur="checkurl()" id="twitter_url" placeholder="Twitter url" 
						name="twitter_url" value="{{ ( (isset($teamsdata) && $teamsdata->twitter_link!='') ? $teamsdata->twitter_link : old('twitter_url')) }}">
						</div>
						<div class="form-group">
                        <label for="company_name">Instagram Url</label>
                        <input type="text" class="form-control socialurl" onblur="checkurl()" id="intagram_url" placeholder="Instagram url" name="intagram_url" value="{{ ( (isset($teamsdata) && $teamsdata->instagram_link!='') ? $teamsdata->instagram_link : old('intagram_url')) }}">
						</div>
                      <div class="form-group">
                        <label>Profile Image upload</label>
                        <input type="file" name="profileimage" class="form-control" id="fileInput">
                         @if( (isset($teamsdata)) && ($teamsdata->member_image !='') )
							<img src="{{ asset('/') }}/public/team_photos/{{$teamsdata->member_image}}" style="width:30%;">
						     <input type="hidden" name="oldmemberimage" value="{{$teamsdata->member_image}}">
						@endif
                      </div>
                   
                     
					  <div class="col-sm-12 text-center">
					   @if((isset($teamsdata))  && ($teamsdata->publish !=''))
					  <input type="hidden" name="team_publish" value="{{ $teamsdata->publish }}">
				
				       @endif
					  <button type="submit" class="btn btn-primary btn-rounded btn-fw" id="submitdata">Submit</button>
                     
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
<script>
// function checkurl()
// {
	// $(".socialurl").each(function() {
           // var socialurl =  $(this).val();
             // if(socialurl !='')
			 // {
				 // if(/^([a-z]([a-z]|\d|\+|-|\.)*):(\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?((\[(|(v[\da-f]{1,}\.(([a-z]|\d|-|\.|_|~)|[!\$&'\(\)\*\+,;=]|:)+))\])|((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=])*)(:\d*)?)(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*|(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)){0})(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(socialurl)) {
				  // alert("valid url");
				  // $('#submitdata').prop('disabled',false);
				// } else {
				  // alert("invalid url");
				  // $('#submitdata').prop('disabled',true);
				// }
							 // }				 
     // });
// }


</script>	  