<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	if (Auth::check()) {
		return redirect()->route('home');
	}
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController');
	Route::resource('location', 'App\Http\Controllers\LocationController');
	Route::resource('collection', 'App\Http\Controllers\PatientCollectionController');
	Route::get('retest/{patient_id}', 'App\Http\Controllers\PatientCollectionController@retest')->name('collection.retest');
	Route::post('search-patient', 'App\Http\Controllers\PatientCollectionController@search')->name('collection.search');
	Route::resource('test_type', 'App\Http\Controllers\TestTypeController');
	Route::resource('symptom', 'App\Http\Controllers\SymptomController');
	Route::resource('lab', 'App\Http\Controllers\LabController');
	Route::resource('race', 'App\Http\Controllers\RaceController');
	Route::resource('ethnicity', 'App\Http\Controllers\EthnicityController');
});
