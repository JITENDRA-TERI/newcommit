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
use App\Models\ContactUs;
use Session;
use DB;
use Validator;
use Input;
use Auth;
use Mail;
use View;
use Redirect;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		
		$getslider=DB::table('sliders')->get();
		$getteamdata=DB::table('team')->get();
		$gettestimonial=DB::table('testimonials')->get();
		$getproperty=DB::table('property_listing')
		 ->join('property_attachment', 'property_attachment.property_id', '=', 'property_listing.id')
		->where([
                 ['property_listing.publish', '=', '1'],
                 ['property_listing.featured_property', '=', '1']
                  ])->get();
		$getmedia=DB::table('media')->orderBy('post_order', 'ASC')->get();
		return View::make('frontend/home')->with(['getslider' => $getslider, 'getproperty' => $getproperty,'getteamdata' => $getteamdata,'getmedia' => $getmedia,'gettestimonial' =>$gettestimonial]);
       
    }
	public function adminindex()
	{
		return view('admin/dashboard');
	}
	
	public function AboutData()
	{
		$getteamdata=DB::table('team')->get();
		$aboutdata=DB::table('page_data')->first();
		return View::make('/frontend/about-us')->with(['aboutdata' => $aboutdata,'getteamdata' => $getteamdata]);
	}
	
	public function ServiceData()
	{
		$serviceid=base64_decode($_GET['scat']);
		$getservices=DB::table('service')->where('subcategory','=',$serviceid)->first();
		return View::make('/frontend/service')->with(['getservices' => $getservices]);
	}
	
	public function MediaData()
	{
		$getmediadata=DB::table('media')->orderBy('id','DESC')->paginate(10);
		return View::make('/frontend/blog')->with(['getmediadata' => $getmediadata]);
		
	}
	
	public function TestimonialData()
	{
		$gettestimonial=DB::table('testimonials')->orderBy('id','DESC')->paginate(10);
		return View::make('/frontend/testimonial')->with(['gettestimonial' => $gettestimonial]);
		
	}
	
	public function AddContactData(Request $request)
	{
		
		$rules = array(
        'username'            => 'required',                        
        'emailid'               => 'required', 
        'contactno'           => 'required', 
		'Query'           => 'required', 
         		
        );
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

        $messages = $validator->messages();

        
        return Redirect::to('/')
            ->withInput()->withErrors($validator);

         }
		 
		 else
		 {
			  $storeconatctus = new ContactUs();
		      $storeconatctus->user_name = $request->input('username');
		      $storeconatctus->user_email = $request->input('emailid');
			  $storeconatctus->user_conatct_no = $request->input('contactno');
			  $storeconatctus->query = $request->input('Query');
			
			
				$storeconatctus->save();
		return Redirect::to('/')->with(['message'=> 'Thanks For contacting Us We Will Get Back To Yo Soon']);
			 
		 }
	}
	
	public function GalleryData()
	{
		$getgallerydata=DB::table('image_gallery')->orderBy('id','DESC')->paginate(20);
		return View::make('/frontend/gallery')->with(['getgallerydata' => $getgallerydata]);
		
	}
	
	public function PropertyListingData()
	{
		$propertylisting=DB::table('property_listing')
		               ->select('property_listing.*','property_attachment.property_id','property_attachment.attachment_path')
                       ->join('property_attachment','property_attachment.property_id','=','property_listing.id')
		               ->orderBy('property_listing.id','DESC')->paginate(20);
		return View::make('/frontend/property-listing')->with(['propertylisting' => $propertylisting]);
		
	}
	
	
}

