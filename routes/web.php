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

Route::get('/admin', function () {
    return view('admin.dgadmin.layout_admin');
});
Route::group(['prefix' => 'admin'], function () {
	Route::group(['prefix' => 'category'], function () {
		//admin/category/show
		Route::get('show', 'CategoryController@getShow');

		Route::get('edit/{id}', 'CategoryController@getEdit');
		Route::post('edit/{id}', 'CategoryController@postEdit');

		Route::get('add', 'CategoryController@getThem');
		Route::post('add', 'CategoryController@postThem');

		Route::get('delete/{id}', 'CategoryController@delete');
	});
	
	Route::group(['prefix' => 'product'], function () {
		//admin/product/show
		Route::get('show', 'ProductController@getShow');

		Route::get('edit/{id}', 'ProductController@getEdit');
		Route::post('edit/{id}', 'ProductController@postEdit');

		Route::get('add', 'ProductController@getThem');
		Route::post('add', 'ProductController@postThem');

		Route::get('delete/{id}', 'ProductController@delete');
    });
});