<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'schools', 'as' => 'schools.'], function() {
	Route::get('/', ['uses' => 'Api\SchoolController@index', 'as' => 'index']);// to access the schools resource
	
	Route::post('/', ['uses' => 'Api\SchoolController@create', 'as' => 'create']);
	
	Route::group(['prefix' => '{school}'], function() {
		Route::get('/', ['uses' => 'Api\SchoolController@show', 'as' => 'show']);

		Route::group(['prefix' => 'products', 'as' => 'products.'], function() {
			Route::get('/', ['uses' => 'Api\SchoolProductController@index', 'as' => 'index']);// to access a given schools products resource
			Route::post('/', ['uses' => 'Api\SchoolProductController@create', 'as' => 'create']);
			Route::get('{product}', ['uses' => 'Api\SchoolProductController@show', 'as' => 'show']);
			Route::put('{product}', ['uses' => 'Api\SchoolProductController@update', 'as' => 'update']);
			Route::delete('{product}', ['uses' => 'Api\SchoolProductController@delete', 'as' => 'delete']);
		});

		Route::put('/', ['uses' => 'Api\SchoolController@update', 'as' => 'update']);
		
		Route::delete('/', ['uses' => 'Api\SchoolController@delete', 'as' => 'delete']);
	});
});

Route::get('export/schools', ['uses' => 'Api\SchoolController@export', 'as' => 'schools.export']);// to export the schools CSV

Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
	Route::get('schoolsCount', ['uses' => 'Api\ProductController@schoolsCount', 'as' => 'schoolsCount']);// to access the schools count endpoint
	Route::get('value', ['uses' => 'Api\ProductController@value', 'as' => 'value']);// to access the product value list endpoint
});

