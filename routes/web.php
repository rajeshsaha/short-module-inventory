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

Route::get( '/', function () {
	return view( 'welcome' );
} );

Auth::routes();

Route::get( '/home', 'HomeController@index' )->name( 'home' );


Route::group( [ 'as' => 'admin.', 'prefix' => 'admin', 'middleware' => [ 'auth', 'backend' ] ], function () {
	Route::resource( 'product', 'ProductController' )->only( [ 'index', 'create', 'store' ] );
	Route::get( '/product/supplier/{id}', 'ProductController@supplierProduct' )->name( 'supplier.product' );
} );

Route::get( '/delivered', 'DeliveryController@index' )->name( 'delivered' );
