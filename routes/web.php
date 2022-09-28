<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'AboutData'])->name('about-us');
Route::get('/service', [App\Http\Controllers\HomeController::class, 'ServiceData'])->name('service');
Route::get('/media', [App\Http\Controllers\HomeController::class, 'MediaData'])->name('media');
Route::get('/testimonial', [App\Http\Controllers\HomeController::class, 'TestimonialData'])->name('testimonial');
Route::post('/add-contact-data', [App\Http\Controllers\HomeController::class, 'AddContactData'])->name('add-contact-data');
Route::get('/gallery', [App\Http\Controllers\HomeController::class, 'GalleryData'])->name('gallery');
Route::get('/property-listing', [App\Http\Controllers\HomeController::class, 'PropertyListingData'])->name('property-listing');



Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminindex'])->name('dashboard');
Route::get('/admin/testimonial', [App\Http\Controllers\AdminController::class, 'ViewTestimonial'])->name('testimonial');
Route::get('/admin/testimonial/add-testimonials', [App\Http\Controllers\AdminController::class, 'AddTestimonials'])->name('add-testimonials');
Route::post('/admin/testimonial/store-testimonial-data', [App\Http\Controllers\AdminController::class, 'StoreTestomonials'])->name('store-testimonial-data');
Route::get('/admin/Services', [App\Http\Controllers\AdminController::class, 'ViewServices'])->name('Services');
Route::get('/admin/Services/add-services', [App\Http\Controllers\AdminController::class, 'AddServices'])->name('add-services');
Route::get('/admin/media', [App\Http\Controllers\AdminController::class, 'ViewMedia'])->name('media');
Route::get('/admin/media/add-media', [App\Http\Controllers\AdminController::class, 'AddMedia'])->name('add-media');
Route::post('/admin/media/store-media-data', [App\Http\Controllers\AdminController::class, 'StoreMedia'])->name('store-media-data');
Route::post('/admin/media/featured-post', [App\Http\Controllers\AdminController::class, 'featuredPostData'])->name('featured-post');
Route::get('/admin/listing-properties', [App\Http\Controllers\AdminController::class, 'ListingProperties'])->name('listing-properties');
Route::get('/admin/listing-properties/add-property-listing', [App\Http\Controllers\AdminController::class, 'AddPropertyListing'])->name('add-property-listing');
Route::post('/admin/listing-properties/store-listing-property', [App\Http\Controllers\AdminController::class, 'StoreListingProperty'])->name('store-listing-property');
Route::get('/admin/teams', [App\Http\Controllers\AdminController::class, 'ViewTeamMembers'])->name('teams');
Route::get('/admin/teams/add-teams-member', [App\Http\Controllers\AdminController::class, 'AddTeamMembers'])->name('add-teams-member');
Route::post('/admin/teams/store-team-members', [App\Http\Controllers\AdminController::class, 'StoreTeamMembers'])->name('store-team-members');
Route::get('/admin/about-us', [App\Http\Controllers\AdminController::class, 'AddAboutUsData'])->name('about-us');
Route::post('/admin/about-us/store-aboutus-data', [App\Http\Controllers\AdminController::class, 'StoreAboutUsData'])->name('store-aboutus-data');
Route::get('/admin/gallery', [App\Http\Controllers\AdminController::class, 'ViewGallery'])->name('gallery');
Route::get('/admin/gallery/add-gallery-image', [App\Http\Controllers\AdminController::class, 'AddGalleryImage'])->name('add-gallery-image');
Route::post('/admin/gallery/store-gallery-image', [App\Http\Controllers\AdminController::class, 'StoregalleryImage'])->name('store-gallery-image');

Route::get('/admin/view-image-gallery', [App\Http\Controllers\AdminController::class, 'ViewImageGallery'])->name('view-image-gallery');
Route::post('/admin/Services/store-service-data', [App\Http\Controllers\AdminController::class, 'StoreServicesData'])->name('store-service-data');
Route::get('/admin/testimonial/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditTestimonial'])->name('edit');
Route::post('/admin/testimonial/update-testimonial-data/{id}', [App\Http\Controllers\AdminController::class, 'UpdateTestimonialData'])->name('update-testimonial-data');

Route::get('/admin/media/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditMedia'])->name('edit');
Route::post('/admin/media/update-media-data/{id}', [App\Http\Controllers\AdminController::class, 'UpdateMediaData'])->name('update-media-data');

Route::get('/admin/teams/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditTeamsData'])->name('edit');
Route::post('/admin/teams/update-team-data/{id}', [App\Http\Controllers\AdminController::class, 'UpdateTeamData'])->name('update-team-data');
Route::get('/admin/Services/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditServicesData'])->name('edit');
Route::post('/admin/Services/update-service-data/{id}', [App\Http\Controllers\AdminController::class, 'UpdateServicesData'])->name('update-service-data');
Route::post('/admin/about-us/update-aboutus-data/', [App\Http\Controllers\AdminController::class, 'UpdateAboutUsData'])->name('update-aboutus-data');
Route::get('/admin/gallery/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditGalleryData'])->name('edit');
Route::post('/admin/gallery/update-image-data/{id}', [App\Http\Controllers\AdminController::class, 'UpdateImageData'])->name('update-image-data');
Route::get('/admin/listing-properties/edit/{id}', [App\Http\Controllers\AdminController::class, 'EditListingPropertyData'])->name('edit');
Route::post('/admin/listing-properties/edit/confirm-delete/{id}' , [App\Http\Controllers\AdminController::class, 'removeEventAttachment'])->name('confirm-delete');
Route::post('/admin/listing-properties/update-listing-data/{id}', [App\Http\Controllers\AdminController::class, 'UpdateListingProperty'])->name('update-listing-data');
Route::post('/admin/listing-properties/featured-property/{id}', [App\Http\Controllers\AdminController::class, 'FeaturedProperty'])->name('featured-property');
Route::get('/admin/view-slider', [App\Http\Controllers\AdminController::class, 'ViewSliderImages'])->name('view-slider');
Route::get('/admin/view-slider/add-slider', [App\Http\Controllers\AdminController::class, 'AddSliderImages'])->name('add-slider');
Route::post('/admin/view-slider/store-slider-data', [App\Http\Controllers\AdminController::class, 'StoreSliderData'])->name('store-slider-data');










