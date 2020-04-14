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


Route::get('/','FrontOffreController@index')->name('home')->middleware('auth');

Route::get('home', function () { 
	return view('home');
})->name('home');
Auth::routes();
Route::resource('offres', 'offreController')->middleware('auth');
Route::resource('front','FrontOffreController');
Route::get('/back', 'offreController@index')->name('back')->middleware('auth');
Route::get('/nos-offres','FrontOffreController@index')->name('les-offres');
Route::get('/offre','offreController@offre')->name('front.offre');

Route::get('mail/send','MailController@html_email')->name('mail.send');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::delete('offres/{id}', 'offreController@destroy');
Route::delete('offres-deleteselection', 'offreController@deleteAll');
Route::delete('users-deleteselection', 'UserController@deleteAll');


//Route::get('/list','offreController@list');
//Route::get('/edit','offreController@edit')->name('edit-offre');
//Route::put('/delete','offreController@destroy')->name('delete-offre');
//Route::post('/store','offreController@store')->name('store');
//Route::put('/update','offreController@update')->name('update-offre');
//Route::get('offres.index','offreController@list')->name('offres');
//Route::resource('offres','offreController');

Route::group(['middleware' => 'auth'], function () {

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

	Route::get('createOffre',function() {
		return view('offres.create');
	})->name('create-offre');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('roles','RoleController');
    Route::resource('offres','offreController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


