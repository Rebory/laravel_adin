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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','FrontController@displaydata');

Route::match(['get', 'post'], '/admin','AdminController@login');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['auth']],function(){
	//Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/dashboard','PostController@index'); 

	Route::get('/admin/settings','AdminController@settings');
	Route::post('/admin/update-dp','AdminController@updatedp');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
    Route::post('/admin/update-profile','AdminController@adminprofile');
    Route::post('/admin/update-username','AdminController@username');
    Route::post('/admin/update-email','AdminController@email');
    Route::post('/admin/update-mobile','AdminController@mobile');
    Route::get('/admin/logo','LogoController@logo');
    Route::get('/admin/logo','LogoController@displaylogo');
    Route::post('/admin/updatelogo','LogoController@updatelogo');
    Route::get('/admin/categories','CatController@index');
    Route::resource('/admin/categories','CatController');
    Route::get('/admin/posts','PostController@index');
    Route::resource('/admin/posts','PostController');
    Route::get('/admin/sliders','SliderController@index');
    Route::resource('/admin/sliders','SliderController');

    Route::get('/admin/aboutus','DynamicController@createabout');
    Route::post('/admin/about-update','DynamicController@aboutusupt');
    
    Route::get('/admin/contactus','DynamicController@createcontact');
    Route::post('/admin/contact-update','DynamicController@contactusupt');

    Route::get('/admin/headerfooter','DynamicController@createheaderfooter');
    Route::post('/admin/headerfooter-update','DynamicController@headerfooterupt');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

 // Route::match(['get','post'],'admin','AdminController@login');
 // Route::get('/admin/dashboard','AdminController@dashboard');

Route::get('/logout','AdminController@logout');