<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Services;
use App\Models\Media;
use App\Models\ListingProperties; 
use App\Models\Teams; 
use App\Models\PageData; 
use App\Models\ImageGallery;
use App\Models\Slider;
use Session;
use DB;
use Validator;
use Input;
use Auth;
use Mail;
use View;
use Redirect;
use File;


class AdminController extends Controller
{
    public function ViewTestimonial()
	{
		if( Auth::user() ){
		$gettestimonial=DB::table('testimonials')->orderBy('id','DESC')->paginate(10);
		
		return View::make('admin/testimonial')->with('gettestimonial', $gettestimonial);
		}
		else
		{
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function AddTestimonials()
	{
		if( Auth::user() ){
			return view('admin/addtestimonials');
		}
		else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function StoreTestomonials(Request $request)
	{
		$rules = array(
        'person_name'            => 'required',                        
        'abstract'               => 'required', 
        'company_name'           => 'required', 
         		
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/testimonial/add-testimonials')
            ->withInput()->withErrors($validator);

         }
		 else{
			  $storetestimonial = new Testimonial();
		      $storetestimonial->name = $request->input('person_name');
		      $storetestimonial->email = $request->input('email_id');
			  $storetestimonial->contact_no = $request->input('contact_no');
			  $storetestimonial->company_name = $request->input('company_name');
			  $storetestimonial->description = $request->input('abstract');
			  if ($request->hasFile('imgupload')) {
					 
					$bookdocs=$request->file('imgupload');
					$fname=$request->file('imgupload')->getClientOriginalName();
					$request->file('imgupload')->move(public_path().'/testimonial_image/', $fname);  
					$storetestimonial->images=$fname;
					}
					else {
						
					$storetestimonial->images ='';
		           }
				$storetestimonial->publish ='0';
				$storetestimonial->save();
		return Redirect::to('/admin/testimonial')->with(['message'=> 'Testimonial Added successfully']);
		 }
		
	}
	
	public function ViewServices()
	{
		if( Auth::user() ){
		$getservices=DB::table('service')->orderBy('id','DESC')->paginate(10);
		return View::make('admin/services')->with('getservices', $getservices);
		}
		else
		{
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	public function AddServices()
	{
		if( Auth::user() ){
			return view('admin/addservices');
		}
		else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function ViewMedia()
	{
		if( Auth::user() ){
		$getmedia=DB::table('media')->orderBy('post_order','DESC')->paginate(10);
		return View::make('admin/media')->with('getmedia', $getmedia);
		}
		else
		{
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function AddMedia()
	{
		if( Auth::user() ){
			return view('admin/addmedia');
		}
		else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function StoreMedia(Request $request)
	{
		$rules = array(
        'post_title'            => 'required',                        
        'post_date'               => 'required', 
        'serviceabstract'           => 'required', 
         		
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/home/testimonial/add-testimonials')
            ->withInput()->withErrors($validator);

         }
		 else{
			  $storemedia = new Media();
		      $storemedia->title = $request->input('post_title');
		      $storemedia->author = $request->input('author_name');
			  $storemedia->abstract_data = $request->input('serviceabstract');
			  $storemedia->post_date = date('y-m-d',strtotime($request->input('post_date')));
			 
			  if ($request->hasFile('serviceimage')) {
					 
					$bookdocs=$request->file('serviceimage');
					$fname=$request->file('serviceimage')->getClientOriginalName();
					$request->file('serviceimage')->move(public_path().'/media_image/', $fname);  
					$storemedia->post_image=$fname;
					}
					else {
						
					$storemedia->post_image ='';
		           }
				$storemedia->publish ='0';
				
				$storemedia->save();
		return Redirect::to('/admin/media')->with(['message'=> 'Media Added successfully']);
		 }
		
	}
	
	public function featuredPostData(Request $request)
	
	{
	
		
		$position = $request->input('position');


		$i=1;
		foreach($position as $k=>$v){
			$updatepublish=DB::table('media')
              ->where('id', $v)  
              ->update(array('post_order' => $i));
			


			$i++;
		}
		 if($updatepublish)
				 {
					 echo 'success';
				 }
				 else{
					 echo 'failed';
				 }
	}
	
	public function ListingProperties()
	{
		if( Auth::user() ){
		$propertylisting=DB::table('property_listing')->orderBy('id','DESC')->paginate(10);
		return View::make('admin/propertylisting')->with('propertylisting', $propertylisting);
		}
		else
		{
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function AddPropertyListing()
	{
		if( Auth::user() ){
			return view('admin/addpropertylisting');
		}
		else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function StoreListingProperty(Request $request)
	{
		$rules = array(
		'property_title'           => 'required',
        'property_type'            => 'required',                        
        'property_city'               => 'required', 
        'property_status'           => 'required', 
		
		
         		
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/listing-properties/add-property-listing')
            ->withInput()->withErrors($validator);

         }
		 else{
			  $storeproperty = new ListingProperties();
			  $storeproperty->property_title = $request->input('property_title');
			  
		      $storeproperty->property_type = $request->input('property_type');
			  $storeproperty->property_city = $request->input('property_city');
			  $storeproperty->property_status = $request->input('property_status');
			  $storeproperty->property_price = $request->input('property_price');
			  $storeproperty->property_location = $request->input('property_locality');
			  $storeproperty->bedrooms = $request->input('no_of_bedrooms');
			  $storeproperty->bathroom = $request->input('no_of_bathrooms');
			  $storeproperty->property_area = $request->input('property_area');
			  $storeproperty->property_built_up = $request->input('property_builtup');
			  $storeproperty->rare_option = $request->input('rare_options');
			  $storeproperty->property_description = $request->input('property_description');
			  $storeproperty->property_face = $request->input('property_face');
			  $storeproperty->super_prime_banglow = $request->input('superprime');
			  if(!empty($request->input('amenities')))
			  {
			  $storeproperty->property_ammities = implode(',',$request->input('amenities'));
			  }
			  else
			  {
				  $storeproperty->property_ammities=$request->input('amenities');
			  }
		
			  $destinationPath = public_path('/property_photos/'); // 
			 
			$storeproperty->publish ='0';
			$storeproperty->save();
			$lastid=$storeproperty->id;
			 $files = [];
			  if ( $request->file('imgupload') && count($request->file('imgupload')) > 0 ){
							foreach ($request->file('imgupload') as $file) {
								 $profileImage =$file->getClientOriginalName();
	                             $file->move($destinationPath, $profileImage);
								 $files[] = $profileImage;  
								 
							}
						}
			foreach($files as $fs)
			{

             DB::table('property_attachment')->insert(['property_id' => $lastid, 'attachment_path' => $fs]);
			}
		    return Redirect::to('/admin/listing-properties')->with(['message'=> 'Listing Properties Added successfully']);
			  
			  
		 }
	}
	public function ViewTeamMembers()
	{
		if( Auth::user() ){
		$getteams=DB::table('team')->orderBy('id','DESC')->paginate(10);
		return View::make('admin/teams')->with('getteams', $getteams);
		}
		else
		{
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	public function AddTeamMembers()
	{
		if( Auth::user() ){
			return view('admin/addteamembers');
		}
		else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function StoreTeamMembers(Request $request)
	{
		
		$rules = array(
        'member_name'            => 'required',
       );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/teams/add-teams-member')
            ->withInput()->withErrors($validator);

         }
		 else{
			  $storeteams = new Teams();
		      $storeteams->member_name = $request->input('member_name');
		      $storeteams->member_email = $request->input('member_email_id');
			  $storeteams->member_contact_no = $request->input('member_contact_no');
			  $storeteams->designation = $request->input('member_designation');
			  $storeteams->short_description = $request->input('member_abstract');
			  $storeteams->company_name = $request->input('member_company_name');
			  $storeteams->fb_link = $request->input('facebook_url');
			  $storeteams->linkndin_link = $request->input('linkdin_url');
			  $storeteams->twitter_link = $request->input('twitter_url');
			  $storeteams->instagram_link = $request->input('intagram_url');
			 
			  if ($request->hasFile('profileimage')) {
					 
					$profileimages=$request->file('profileimage');
					$fname=$request->file('profileimage')->getClientOriginalName();
					$profileimages->move(public_path('team_photos'), $fname);
					$storeteams->member_image=$fname;
					}
					else {
						
					$storeteams->member_image ='';
		           }
				$storeteams->publish ='0';
				
				$storeteams->save();
		return Redirect::to('/admin/teams')->with(['message'=> 'Team Member Added successfully']);
		 }
		
	}
	public function AddAboutUsData()
	{
		if( Auth::user() ){
			$getdata=DB::table('page_data')->first();
			return View::make('admin/addaboutus')->with('getdata', $getdata);
			
		}
		else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	
	public function StoreAboutUsData(Request $request)
	{
		
		$rules = array(
        'aboutabstract'            => 'required',
       );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/about-us')
            ->withInput()->withErrors($validator);

         }
		 else{
			  $storeaboutdata = new PageData();
		      $storeaboutdata->abstract_about = $request->input('aboutabstract');
		      $storeaboutdata->save();
		return Redirect::to('/admin/about-us')->with(['message'=> 'Content Added successfully']);
		 }
		
	}
	public function UpdateAboutUsData(Request $request)
	{
		
		$rules = array(
        'aboutabstract'            => 'required',
       );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/about-us')
            ->withInput()->withErrors($validator);

         }
		 else{
			  $updateaboutdata = PageData::find(1);
		      $updateaboutdata->abstract_about = $request->input('aboutabstract');
		           if($updateaboutdata->isDirty() == 1)
				 {		
			     
                  $updateaboutdata->update();			 
                 return Redirect::to('/admin/about-us')->with(['message'=> 'Data updated successfully!']);	
				 }
                 else {
					 
					  
					 return Redirect::to('/admin/about-us/')
                    ->withInput()->with(['message'=> 'Please update data before submitting!']);	
				 }	
		 }
		
	}
	
	
	
	public function ViewGallery()
	{
		if( Auth::user() ){
		$gallery=DB::table('image_gallery')->orderBy('id','DESC')->paginate(10);
		return View::make('admin/gallery')->with('gallery', $gallery);
		}
		else
		{
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	public function AddGalleryImage()
	{
		if( Auth::user() ){
			return view('admin/addgallery');
		}
		else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	public function StoregalleryImage(Request $request)
	{
		$rules = array(
        'gallery_title'            => 'required',                        
        
		
         		
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/gallery/add-gallery-image')
            ->withInput()->withErrors($validator);

         }
		 else{
			 
			  $destinationPath = public_path('/gallery_images/'); // 
			  $imggallery = [];
			 $storegalleryimage = new ImageGallery();
			  if ( $request->file('gallerimages') && count($request->file('gallerimages')) > 0 ){
							foreach ($request->file('gallerimages') as $file) {
								 
								  $galleryimgaes =$file->getClientOriginalName();
	                             $file->move($destinationPath, $galleryimgaes);
								  
		                          
								  $storegalleryimage::create([

									'image_title' => $request->input('gallery_title'),

									'image_name' => $galleryimgaes

									]);
                             								 
								 
							}
						}
						
			
		    return Redirect::to('/admin/gallery')->with(['message'=> 'Gallery Added successfully']);
			  
			  
		 }
	}
	public function ViewImageGallery()
	{
		if( Auth::user() ){
			$imgid=$_GET['imgid'];
		$galleryimg=DB::table('image_gallery')->where('id','=',$imgid)->paginate(10);
		return View::make('admin/viewgallery')->with('galleryimg', $galleryimg);
		}
		else
		{
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
		public function StoreServicesData(Request $request)
	{
		$rules = array(
        'services'            => 'required',                        
        'serviceabstract'               => 'required', 
    
         		
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/Services/add-services')->withInput()->withErrors($validator);

         }
		 else{
			  $cat1array=array("Residential Sales","Commercial Investment");
			  $cat2array=array("Commercial Valuations","Credit and Legal Assistance");
			  $cat3array=array("Consulting and Research","Real Estate Consulting","Find the Right investment Project","Residential Valuations");
			  $storeservices = new Services();
			  if(in_array( $request->input('services'),$cat1array))
			  {
				 $storeservices->category = 'Agency';
			  }
			  if(in_array( $request->input('services'),$cat2array))
			  {
				 $storeservices->category='Asset Valuation';
			  }
			   if(in_array( $request->input('services'),$cat3array))
			  {
				 $storeservices->category='Advisory';
			  }
		      $storeservices->subcategory = $request->input('services');
		      $storeservices->abstract_service = $request->input('serviceabstract');
			
			  if ($request->hasFile('serviceimage')) {
					 
					$bookdocs=$request->file('serviceimage');
					$fname=$request->file('serviceimage')->getClientOriginalName();
					$request->file('serviceimage')->move(public_path().'/service_image/', $fname);  
					$storeservices->service_image=$fname;
					}
					else {
						
					$storeservices->service_image ='';
		           }
				$storeservices->publish ='0';
				$storeservices->save();
		return Redirect::to('/admin/Services')->with(['message'=> 'Services Added successfully']);
		 }
		
	}
	
	public function EditTestimonial($id)
	{
	
		$edittestimonial=DB::table('testimonials')->where('id','=',$id)->first();
		return view('admin/addtestimonials')->with('edittestimonial',$edittestimonial);
	}
	
	public function UpdateTestimonialData(Request $request,$id)
	{
		
		$rules = array(
        'person_name'            => 'required',                        
        'abstract'            => 'required',
        'company_name'       => 'required',	
       
      
        
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
         
        $messages = $validator->messages();

        
        return Redirect::to('/admin/testimonial/edit/'.$id)
            ->withInput()->withErrors($validator);

         }
		 else{
			 
		$testimonialedit = Testimonial::find($id);
		$testimonialimg=$request->input('oldtestimonialimage'); 
		if ($request->hasFile('imgupload')){
					/* $image_path = public_path("/book_docs/".$bookspdf);
					if (File::exists($image_path)) {
						File::delete($image_path);
					} */
					$testimonialimages = $request->file('imgupload');
					$imgName = time().'_'.$testimonialimages->getClientOriginalName();
					$destinationPath = public_path('/testimonial_image/');
					$testimonialimages->move($destinationPath, $imgName);
				    $testimonialedit->images=$imgName;
				  } else {
					 $testimonialedit->images = $testimonialimg;
	             }
				 $testimonialedit->name=$request->input('person_name');
                 $testimonialedit->email =$request->input('email_id');
                 $testimonialedit->contact_no=$request->input('contact_no');
				 $testimonialedit->company_name=$request->input('company_name');
				 $testimonialedit->description=$request->input('abstract');
				$testimonialedit->publish=$request->input('book_publish');
				 
                 
				
                 
                 if($testimonialedit->isDirty() == 1)
				 {		
			     
                  $testimonialedit->update();			 
                 return Redirect::to('/admin/testimonial')->with(['message'=> 'Testimonial updated successfully!']);	
				 }
                 else {
					 
					  
					 return Redirect::to('/admin/testimonial/edit/'.$id)
                    ->withInput()->with(['message'=> 'Please update data before submitting!']);	
				 }	

		 }				 
	}
	
	public function EditMedia($id)
	{
	
		$mediadata=DB::table('media')->where('id','=',$id)->first();
		return view('admin/addmedia')->with('addmedia',$mediadata);
	}
	
	public function UpdateMediaData(Request $request,$id)
	{
		
		$rules = array(
        'post_title'            => 'required',                        
        'post_date'            => 'required',
        'serviceabstract'       => 'required',	
       
      
        
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
         
        $messages = $validator->messages();

        
        return Redirect::to('/admin/media/edit/'.$id)
            ->withInput()->withErrors($validator);

         }
		 else{
			 
		$mediaedit = Media::find($id);
		$mediaimg=$request->input('oldmediaimage'); 
		if ($request->hasFile('serviceimage')){
					/* $image_path = public_path("/book_docs/".$bookspdf);
					if (File::exists($image_path)) {
						File::delete($image_path);
					} */
					$mediaimages = $request->file('serviceimage');
					$imgName = time().'_'.$mediaimages->getClientOriginalName();
					$destinationPath = public_path('/media_image/');
					$mediaimages->move($destinationPath, $imgName);
				    $mediaedit->post_image=$imgName;
				  } else {
					 $mediaedit->post_image = $mediaimg;
	             }
				 $mediaedit->title=$request->input('post_title');
                 $mediaedit->author =$request->input('author_name');
                 $mediaedit->abstract_data=$request->input('serviceabstract');
				 $mediaedit->post_date=date('y-m-d',strtotime($request->input('post_date')));
				$mediaedit->publish=$request->input('addmedia_publish');
				$mediaedit->post_order=$request->input('addmedia_post_order');
				
				 
                 
				
                 
                 if($mediaedit->isDirty() == 1)
				 {		
			     
                  $mediaedit->update();			 
                 return Redirect::to('/admin/media')->with(['message'=> 'Media Data updated successfully!']);	
				 }
                 else {
					 
					  
					 return Redirect::to('/admin/media/edit/'.$id)
                    ->withInput()->with(['message'=> 'Please update data before submitting!']);	
				 }	

		 }				 
	}
	
	
	public function EditTeamsData($id)
	{
	
		$teamsdata=DB::table('team')->where('id','=',$id)->first();
		return view('admin/addteamembers')->with('teamsdata',$teamsdata);
	}
	
	public function UpdateTeamData(Request $request,$id)
	{
		
		$rules = array(
        'member_name'            => 'required',                        
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
         
        $messages = $validator->messages();

        
        return Redirect::to('/admin/teams/edit/'.$id)
            ->withInput()->withErrors($validator);

         }
		 else{
			 
		$teamedit = Teams::find($id);
		$teamimg=$request->input('oldmemberimage'); 
		if ($request->hasFile('profileimage')){
					/* $image_path = public_path("/book_docs/".$bookspdf);
					if (File::exists($image_path)) {
						File::delete($image_path);
					} */
					$teamimages = $request->file('profileimage');
					$imgName = time().'_'.$teamimages->getClientOriginalName();
					$destinationPath = public_path('/team_photos/');
					$teamimages->move($destinationPath, $imgName);
				    $teamedit->member_image=$imgName;
				  } else {
					 $teamedit->member_image = $teamimg;
	             }
				 $teamedit->member_name=$request->input('member_name');
                 $teamedit->member_email =$request->input('member_email_id');
                 $teamedit->member_contact_no=$request->input('member_contact_no');
				 $teamedit->designation = $request->input('member_designation');
				 $teamedit->short_description=$request->input('member_abstract');
				$teamedit->company_name=$request->input('member_company_name');
				$teamedit->fb_link=$request->input('facebook_url');
				$teamedit->linkndin_link=$request->input('linkdin_url');
				$teamedit->twitter_link=$request->input('twitter_url');
				$teamedit->instagram_link=$request->input('intagram_url');
				$teamedit->publish=$request->input('team_publish');
				
				 
                 
				
                 
                 if($teamedit->isDirty() == 1)
				 {		
			     
                  $teamedit->update();			 
                 return Redirect::to('/admin/teams')->with(['message'=> 'Team Data updated successfully!']);	
				 }
                 else {
					 
					  
					 return Redirect::to('/admin/teams/edit/'.$id)
                    ->withInput()->with(['message'=> 'Please update data before submitting!']);	
				 }	

		 }				 
	}
	
	public function EditServicesData($id)
	{
	
		$servicesdata=DB::table('service')->where('id','=',$id)->first();
		return view('admin/addservices')->with('servicesdata',$servicesdata);
	}
	
	public function UpdateServicesData(Request $request,$id)
	{
		
		$rules = array(
        'services'            => 'required',                        
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
         
        $messages = $validator->messages();

        
        return Redirect::to('/admin/Services/edit/'.$id)
            ->withInput()->withErrors($validator);

         }
		 else{
			 
		$serviceedit = Services::find($id);
		$serviceimg=$request->input('oldserviceimage'); 
		      $cat1array=array("Residential Sales","Commercial Investment");
			  $cat2array=array("Commercial Valuations","Credit and Legal Assistance");
			  $cat3array=array("Consulting and Research","Real Estate Consulting","Find the Right investment Project","Residential Valuations");
			 
			  if(in_array( $request->input('services'),$cat1array))
			  {
				 $serviceedit->category = 'Agency';
			  }
			  if(in_array( $request->input('services'),$cat2array))
			  {
				 $serviceedit->category='Asset Valuation';
			  }
			   if(in_array( $request->input('services'),$cat3array))
			  {
				 $serviceedit->category='Advisory';
			  }
		if ($request->hasFile('serviceimage')){
					/* $image_path = public_path("/book_docs/".$bookspdf);
					if (File::exists($image_path)) {
						File::delete($image_path);
					} */
					$serviceimages = $request->file('serviceimage');
					$imgName = time().'_'.$serviceimages->getClientOriginalName();
					$destinationPath = public_path('/service_image/');
					$serviceimages->move($destinationPath, $imgName);
				    $serviceedit->service_image=$imgName;
				  } else {
					 $serviceedit->service_image = $serviceimg;
	             }
				 $serviceedit->subcategory=$request->input('services');
                 $serviceedit->abstract_service =$request->input('serviceabstract');
                 $serviceedit->publish=$request->input('service_publish');
				
				
				 
                 
				
                 
                 if($serviceedit->isDirty() == 1)
				 {		
			     
                  $serviceedit->update();			 
                 return Redirect::to('/admin/Services')->with(['message'=> 'Services Data updated successfully!']);	
				 }
                 else {
					 
					  
					 return Redirect::to('/admin/Services/edit/'.$id)
                    ->withInput()->with(['message'=> 'Please update data before submitting!']);	
				 }	

		 }				 
	}
	
	public function EditGalleryData($id)
	{
	
		$gallerydata=DB::table('image_gallery')->where('id','=',$id)->first();
		return view('admin/addgallery')->with('gallerydata',$gallerydata);
	}
	
		public function UpdateImageData(Request $request,$id)
	{
		
	
		$galleryedit = ImageGallery::find($id);
		$galleryimg=$request->input('oldgalleryimage');
              	
		if (($request->hasFile('updatedimage')) && ($request->file('updatedimage') !='') ){
			
					 // $image_path = public_path("/gallery_images/".$galleryimg);
					// if (File::exists($image_path)) {
						// File::delete($image_path);
					// } 
					$galleryimages = $request->file('updatedimage');
					$imgName = time().'_'.$galleryimages->getClientOriginalName();
					$destinationPath = public_path('/gallery_images/');
					$galleryimages->move($destinationPath, $imgName);
				    $galleryedit->image_name=$imgName;
				  }
				  else {
					 
					 $galleryedit->image_name = $galleryimg;
	             }
				 
				$galleryedit->publish=$request->input('gallery_publish');
				
				 
                 
				
                 
                 if($galleryedit->isDirty() == 1)
				 {		
			     
                  $galleryedit->update();			 
                 return Redirect::to('/admin/gallery')->with(['message'=> 'Gallery Data updated successfully!']);	
				 }
                 else {
					 
					  
					 return Redirect::to('/admin/gallery/edit/'.$id)
                    ->withInput()->with(['message'=> 'Please update data before submitting!']);	
				 }	

		 			 
	}
	
	public function EditListingPropertyData($id)
	{
	
		$listingdata=ListingProperties::with('property_attachment')->where('id','=',$id)->first();
		
		return view('admin/addpropertylisting')->with(array('listingdata'=>$listingdata));
	}
	
	public function removeEventAttachment($attach_id){
	
		if( Auth::user() ){
			
				DB::table('property_attachment')->where('id', '=', $attach_id)->delete();
			
		} else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the dashboard.');
		}
	}
	
	public function UpdateListingProperty(Request $request,$id)
	{
		
		$rules = array(
		'property_title'           => 'required',
        'property_type'            => 'required', 
        'property_city'            => 'required', 		
		'property_status'            => 'required',
       		
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
         
        $messages = $validator->messages();

        
        return Redirect::to('/admin/listing-properties/edit/'.$id)
            ->withInput()->withErrors($validator);

         }
		 else{
			 
		              $listingeedit = ListingProperties::find($id);
					  $listingeedit->property_title = $request->input('property_title');
					  
		              $listingeedit->property_type = $request->input('property_type');
					  $listingeedit->property_city = $request->input('property_city');
					  $listingeedit->property_status = $request->input('property_status');
					  $listingeedit->property_price = $request->input('property_price');
					  $listingeedit->property_location = $request->input('property_locality');
					  $listingeedit->bedrooms = $request->input('no_of_bedrooms');
					  $listingeedit->bathroom = $request->input('no_of_bathrooms');
					  $listingeedit->property_area = $request->input('property_area');
					  $listingeedit->property_built_up = $request->input('property_builtup');
					  $listingeedit->rare_option = $request->input('rare_options');
					  $listingeedit->property_description = $request->input('property_description');
					  $listingeedit->property_face = $request->input('property_face');
					  $listingeedit->super_prime_banglow = $request->input('superprime');
					  $listingeedit->property_ammities = implode(',',$request->input('amenities'));
				      $listingeedit->publish=$request->input('listing_publish');
				
				$files = [];
					  $destinationPath = public_path('/property_photos/'); 
			   if ( $request->file('imgupload') && count($request->file('imgupload')) > 0 ){
							foreach ($request->file('imgupload') as $file) {
								 $profileImage =$file->getClientOriginalName();
	                             $file->move($destinationPath, $profileImage);
								 $files[] = $profileImage;  
								 
							}
							foreach($files as $fs)
							{

							 DB::table('property_attachment')->insert(['property_id' => $id, 'attachment_path' => $fs]);
							}
						}
					
				 
                 
				
                 
                 if($listingeedit->isDirty() == 1)
				 {		
			     
                  $listingeedit->update();			 
                 return Redirect::to('/admin/listing-properties')->with(['message'=> 'Listing Data updated successfully!']);	
				 }
                 else {
					 
					  
					 return Redirect::to('/admin/listing-properties/edit/'.$id)
                    ->withInput()->with(['message'=> 'Please update data before submitting!']);	
				 }	

		 }				 
	}
	 public function FeaturedProperty(Request $request,$id)
			 {
				 $featuredproperty = ListingProperties::find($id);
				 $featuredproperty->featured_property = $request->input('check_featured');
				 $updatefeatured=$featuredproperty->update();
				 if($updatefeatured)
				 {
					 echo 'success';
				 }
				 else{
					 echo 'failed';
				 }
			 } 
			 
			 
	
	
	public function ViewSliderImages()
	{
		if( Auth::user() ){
		$sliders=DB::table('sliders')->orderBy('id','DESC')->paginate(10);
		return View::make('admin/slider')->with('sliders', $sliders);
		}
		else
		{
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
	
	
	
	public function AddSliderImages()
	{
		if( Auth::user() ){
			return view('admin/addslider');
		}
		else {
			return Redirect::to('login')->with('notLoggedInError', 'Error: Please login to access the portal.');
		}
	}
	
		public function StoreSliderData(Request $request)
	{
		$rules = array(
        'sliderimage'            => 'required',                        
        'slidereffects'               => 'required', 
      
		
         		
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/admin/view-slider/add-slider')
            ->withInput()->withErrors($validator);

         }
		 else{
			  $storeslider = new Slider();
		     
			 
		
			  $destinationPath = public_path('/slider_images/'); // 
			 
		
			 $files = [];
			  if ( $request->file('sliderimage') && count($request->file('sliderimage')) > 0 ){
							foreach ($request->file('sliderimage') as $file) {
								 $sliderImage =$file->getClientOriginalName();
	                             $file->move($destinationPath, $sliderImage);
								 $files[] = $sliderImage;  
								 
							}
						}
			$slidereffect = $request->input('slidereffects');
			
			foreach($files as $fs)
			{
				 
				DB::table('sliders')->insert(['slider_images' => $fs,'slider_effect'=>$slidereffect,'publish' =>0]);
			}
		    return Redirect::to('/admin/view-slider')->with(['message'=> 'Slider Added successfully']);
			  
			  
		 }
	}
	
	
	
	
	
	
	
}
