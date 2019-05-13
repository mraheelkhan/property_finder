<?php

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

Route::get('/test', function () {
    return view('test');
});

Auth::routes();
Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });
//==================================================================
//======================== Public Routes ===========================
Route::get('/home', 'HomeController@index')->name('home');
// public home page
Route::get('/', 'PublicController@index')->name('HomePage');
Route::get('/rents', 'PublicController@renting')->name('Renting');
Route::get('/sales', 'PublicController@sales')->name('Sales');

//==================================================================
//======================== Public User Routes ======================

// public listing routes
Route::get('/submit', 'ListingController@index')->name('SubmitList')->middleware('auth');
Route::get('/submited', 'ListingController@index')->name('SubmitedList')->middleware('auth');
Route::get('/submit/create', 'ListingController@create')->name('SubmitCreate')->middleware('auth');
Route::post('/submit/store', 'ListingController@store')->name('SubmitStore')->middleware('auth');
Route::get('/ads/{id}', 'ListingController@show')->name('SubmitShow');;
Route::get('/submit/delete/{id}', 'ListingController@delete')->name('SubmitDelete')->middleware('auth');
Route::get('/ads/activate/{id}', 'ListingController@activate')->name('SubmitActivate')->middleware('auth');
Route::get('/ads/deactivate/{id}', 'ListingController@deactivate')->name('SubmitDeactivate')->middleware('auth');
Route::post('/ad/update', 'ListingController@update')->name('SubmitUpdate');

//============================================================
//======================== ADMIN Routes ======================

// admin dashboard 
Route::get('/dashboard', 'ProfileController@dashboard')->name('Dashboard')->middleware('auth');
Route::get('/admin', 'ProfileController@dashboard')->name('Dashboard')->middleware('auth');

// Listing Areas CRUD
Route::get('/area/create', 'ListingAreaController@create')->name('ListingAreaList')->middleware('auth');
Route::post('/area/store', 'ListingAreaController@store')->name('ListingAreaStore')->middleware('auth');
Route::get('/area/delete/{id}', 'ListingAreaController@delete')->name('ListingAreaDelete')->middleware('auth');
Route::get('/area/activate/{id}', 'ListingAreaController@activate')->name('ListingAreaActivate')->middleware('auth');
Route::get('/area/deactivate/{id}', 'ListingAreaController@deactivate')->name('ListingAreaDeactivate')->middleware('auth');

// Sector CRUD
Route::get('/sector/create', 'SectorController@create')->name('SectorList')->middleware('auth');
Route::post('/sector/store', 'SectorController@store')->name('SectorStore')->middleware('auth');
Route::get('/sector/delete/{id}', 'SectorController@delete')->name('SectorDelete')->middleware('auth');
Route::get('/sector/activate/{id}', 'SectorController@activate')->name('SectorActivate')->middleware('auth');
Route::get('/sector/deactivate/{id}', 'SectorController@deactivate')->name('SectorDeactivate')->middleware('auth');

// City CRUD
Route::get('/city/create', 'CityController@create')->name('CityList')->middleware('auth');
Route::post('/city/store', 'CityController@store')->name('CityStore')->middleware('auth');
Route::get('/city/delete/{id}', 'CityController@delete')->name('CityDelete')->middleware('auth');
Route::get('/city/activate/{id}', 'CityController@activate')->name('CityActivate')->middleware('auth');
Route::get('/city/deactivate/{id}', 'CityController@deactivate')->name('CityDeactivate')->middleware('auth');

// Listing All List
Route::get('/listings', 'ListingController@listinglist')->name('ListingList')->middleware('auth');

//profile 
Route::get('/profile', 'ProfileController@user_profile')->name('Profile')->middleware('auth');
Route::post('/profile/update', 'ProfileController@user_profile_update')->name('ProfileUpdate')->middleware('auth');

// Service Provider routes
Route::get('/services', 'ServiceProviderController@services')->name('ServiceProviderServices')->middleware('auth');
Route::get('/service/update/{sp}/{service_id}/{status}/', 'ServiceProviderController@toggle')->name('ServiceProviderServices')->middleware('auth');

// Admin user panel routes
Route::get('/admin/users', 'AdminController@index')->name('AdminUsers')->middleware('auth');
Route::post('/admin/users/add', 'AdminController@create')->name('AddNewUser')->middleware('auth');
Route::get('/admin/users/activate/{id}', 'AdminController@activate')->name('AdminActivate')->middleware('auth');
Route::get('/admin/users/deactivate/{id}', 'AdminController@deactivate')->name('AdminDeactivate')->middleware('auth');
Route::get('/admin/users/delete/{id}', 'AdminController@delete')->name('AdminDelete')->middleware('auth');

// Comment routes
Route::post('/postcomment', 'CommentController@store')->name('PostComment')->middleware('auth');

//  AJAX routes 
Route::get('/city/getsectorslist/{id}', 'CityController@getSectorsListByCityId')->name('GetSectorsList')->middleware('auth');

