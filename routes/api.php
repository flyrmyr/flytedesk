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

Route::group(['prefix' => 'schools', 'as' => 'schools.'], function(){
	Route::get('/', ['uses' => 'Api\SchoolController@index', 'as' => 'index']);// to access the schools resource
	Route::post('/', ['uses' => 'Api\SchoolController@create', 'as' => 'create']);
	
	Route::get('{school}', ['uses' => 'Api\SchoolController@show', 'as' => 'show']);
	Route::get('{school}/products', ['uses' => 'Api\ProductController@index', 'as' => 'products']);// to access a given schools products resource
	
	Route::put('{school}', ['uses' => 'Api\SchoolController@update', 'as' => 'update']);
	
	Route::delete('{school}', ['uses' => 'Api\SchoolController@delete', 'as' => 'delete']);
});
Route::get('export/schools', ['uses' => 'Api\SchoolController@export', 'as' => 'schools.export']);// to export the schools CSV

Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
	Route::get('/', ['uses' => 'Api\ProductController@index', 'as' => 'index']);// to access the schools count 
	Route::get('products/schoolsCount', ['uses' => 'Api\ProductController@schoolsCount', 'as' => 'schoolsCount']);// to access the schools count endpoint
	Route::get('products/value', ['uses' => 'Api\ProductController@value', 'as' => 'value']);// to access the product value list endpoint
});

