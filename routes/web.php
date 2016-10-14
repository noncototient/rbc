<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', function(){
	return redirect('/login');
});

Route::get('/orders', 'OrdersController@index');
Route::get('/orders/create', 'OrdersController@create');
Route::get('/api/searchCustomer', 'ApiSearchController@searchCustomer');
