<?php

$namespace = 'Restclient\Http\Controllers';

Route::group([
	'middleware' => 'web',
    'namespace' => $namespace,
], function(){
	
	Route::get('/products/available', 'ProductsController@available');
	Route::get('/products/available/{amount}', 'ProductsController@availableCondition');
	Route::get('/products/unavailable', 'ProductsController@unavailable');

	//Route::resources(['/products' => 'ProductController']);
	Route::resource('/products', 'ProductsController', ['except' => ['create', 'show']]);
});

	




