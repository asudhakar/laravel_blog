<?php

	// login and logout and validation

Route::get('login', 'SessionController@create');

Route::get('logout', 'SessionController@destroy');

Route::resource('session', 'SessionController');


	   // users full functionality

Route::get('/', 'UsersController@main');

Route::get('users', 'UsersController@index');

Route::get('users/{id}', 'UsersController@show')->before('auth');;

Route::get('signup', 'UsersController@create');

Route::post('store', 'UsersController@store');

	
		// post full functionality


Route::get('create_post', 'PostController@create')->before('auth');

Route::post('store_post', 'PostController@store')->before('auth');

Route::get('posts', 'PostController@view');

Route::get('posts/{id}', 'PostController@show');

		//Comment

Route::post('store_cmd', 'CommantController@store');


