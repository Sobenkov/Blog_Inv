<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['meddleware' => 'guest'], function(){
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'Auth\RegisterController@register');
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login');
});

//account
Route::group(['meddleware' => 'auth'], function(){
	Route::get('/logout', function(){
		\Auth::logout();
		return redirect(route('login'));
	}) ->name('logout');
	Route::get('/my/account', 'AccountController@index')->name('account');

	//admin
	Route::group(['meddleware' => 'admin'], function(){
		Route::get('/admin', 'Admin\AccountController@index')->name('admin');
	});
});
