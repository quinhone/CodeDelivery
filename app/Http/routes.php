<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get ( '/', function () {
	return view ( 'welcome' );
} );


Route::get ( '/home', function () {
	return view ( 'welcome' );
} );

Route::group ( [ 'prefix' => 'admin', 'middleware' => 'auth.checkrole:admin', 'as' => 'admin.' ], function () {

	Route::group ( [ 'prefix' => 'categories', 'as' => 'categories.' ], function () {

		Route::get ( '/', [ 'as' => 'index', 'uses' => 'CategoriesController@index' ] );
		Route::get ( 'create', [ 'as' => 'create', 'uses' => 'CategoriesController@create' ] );
		Route::get ( 'edit/{id}', [ 'as' => 'edit', 'uses' => 'CategoriesController@edit' ] );
		Route::post ( 'update/{id}', [ 'as' => 'update', 'uses' => 'CategoriesController@update' ] );
		Route::get ( 'delete/{id}', [ 'as' => 'delete', 'uses' => 'CategoriesController@delete' ] );
		Route::post ( 'store', [ 'as' => 'store', 'uses' => 'CategoriesController@store' ] );

	} );

	Route::group ( [ 'prefix' => 'clients', 'as' => 'clients.' ], function () {

		Route::get ( '/', [ 'as' => 'index', 'uses' => 'ClientsController@index' ] );
		Route::get ( 'create', [ 'as' => 'create', 'uses' => 'ClientsController@create' ] );
		Route::get ( 'edit/{id}', [ 'as' => 'edit', 'uses' => 'ClientsController@edit' ] );
		Route::post ( 'update/{id}', [ 'as' => 'update', 'uses' => 'ClientsController@update' ] );
		Route::get ( 'delete/{id}', [ 'as' => 'delete', 'uses' => 'ClientsController@delete' ] );
		Route::post ( 'store', [ 'as' => 'store', 'uses' => 'ClientsController@store' ] );

	} );

	Route::group ( [ 'prefix' => 'products', 'as' => 'products.' ], function () {

		Route::get ( '/', [ 'as' => 'index', 'uses' => 'ProductsController@index' ] );
		Route::get ( 'create', [ 'as' => 'create', 'uses' => 'ProductsController@create' ] );
		Route::get ( 'edit/{id}', [ 'as' => 'edit', 'uses' => 'ProductsController@edit' ] );
		Route::post ( 'update/{id}', [ 'as' => 'update', 'uses' => 'ProductsController@update' ] );
		Route::get ( 'delete/{id}', [ 'as' => 'delete', 'uses' => 'ProductsController@delete' ] );
		Route::post ( 'store', [ 'as' => 'store', 'uses' => 'ProductsController@store' ] );

	} );

	Route::group ( [ 'prefix' => 'orders', 'as' => 'orders.' ], function () {

		Route::get ( '/', [ 'as' => 'index', 'uses' => 'OrdersController@index' ] );
		Route::get ( 'edit/{id}', [ 'as' => 'edit', 'uses' => 'OrdersController@edit' ] );
		Route::post ( 'update/{id}', [ 'as' => 'update', 'uses' => 'OrdersController@update' ] );

	} );
	Route::group ( [ 'prefix' => 'cupoms', 'as' => 'cupoms.' ], function () {

		Route::get ( '/', [ 'as' => 'index', 'uses' => 'CupomsController@index' ] );
		Route::get ( 'edit/{id}', [ 'as' => 'edit', 'uses' => 'CupomsController@edit' ] );
		Route::get ( 'create', [ 'as' => 'create', 'uses' => 'CupomsController@create' ] );
		Route::post ( 'store', [ 'as' => 'store', 'uses' => 'CupomsController@store' ] );
		Route::post ( 'update/{id}', [ 'as' => 'update', 'uses' => 'CupomsController@update' ] );
		Route::get ( 'delete/{id}', [ 'as' => 'delete', 'uses' => 'CupomsController@delete' ] );

	} );


} );

Route::group ( [ 'prefix' => 'customer', 'middleware' => 'auth.checkrole:client', 'as' => 'customer.' ], function () {
	Route::get ( '/', [ 'as' => 'order', 'uses' => 'CheckoutController@index' ] );
	Route::get ( 'order', [ 'as' => 'order.index', 'uses' => 'CheckoutController@index' ] );
	Route::get ( 'order/edit', [ 'as' => 'order.edit', 'uses' => 'CheckoutController@edit' ] );
	Route::get ( 'order/create', [ 'as' => 'order.create', 'uses' => 'CheckoutController@create' ] );
	Route::get ( 'order/delete', [ 'as' => 'order.delete', 'uses' => 'CheckoutController@delete' ] );
	Route::post ( 'order/store', [ 'as' => 'order.store', 'uses' => 'CheckoutController@store' ] );
} );

Route::group ( [ 'prefix' => 'api', 'middleware' => 'oauth', 'as' => 'api.' ], function () {

	Route::group ( [ 'prefix' => 'client', 'middleware' => 'oauth.checkrole:client', 'as' => 'client.' ], function () {

		Route::resource ( 'order',
			'Api\Client\ClientCheckoutController', [ 'except' => [ 'create', 'edit', 'destroy' ]
			] );

	} );

	Route::resource ( 'authenticated',
		'Api\Client\UserController', [ 'except' => [ 'show', 'create', 'store', 'edit', 'destroy' ]
		] );

	Route::group ( [ 'prefix' => 'deliveryman', 'middleware' => 'oauth.checkrole:deliveryman', 'as' => 'deliveryman.' ], function () {
		Route::resource ( 'order',
			'Api\Deliveryman\DeliverymanCheckoutController', [ 'except' => [ 'create', 'edit', 'destroy', 'store' ]
			] );

		Route::patch ( 'order/{id}/update-status', [ 'uses' => 'Api\Deliveryman\DeliverymanCheckoutController@updateStatus', 'as' => 'order.update_status' ] );
	} );

} );

Route::post ( 'oauth/access_token', function () {
	return Response::json ( Authorizer::issueAccessToken () );
} );
