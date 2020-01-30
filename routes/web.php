<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['meddleware' => 'guest'], function(){
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'Auth\RegisterController@register');
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('Login');
	Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['meddleware' => 'auth'], function(){
	Route::get('/my/account', 'AccountController@index')->name('account');
});
