<?php


Auth::routes();

Route::get('/', function(){
	return redirect('/orders');
});

// Routes that require authentication
Route::group(['middleware' => 'auth'], function(){
	// Page routes
	// Orders
	Route::get('/orders', 'OrdersController@index');
	Route::get('/orders/create', 'OrdersController@create');

	// Menu
	Route::get('/menu', 'MenuController@index');

	Route::get('/menu/create', 'MenuController@showCreate');
	Route::post('/menu/create', 'MenuController@store');

	Route::post('/menu/{id}/edit', 'MenuController@update');
	Route::get('/menu/{id}/edit', 'MenuController@showEdit');


	// API routes for searching
	Route::get('/api/searchCustomer', 'ApiSearchController@searchCustomer');
	Route::get('/api/searchItems', 'ApiSearchController@searchItems');
	Route::post('/api/processOrder', 'OrdersController@processOrder');
});


