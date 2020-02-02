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
	Route::group(['meddleware' => 'admin', 'prefix' => 'admin'], function(){
		Route::get('/', 'Admin\AccountController@index')->name('admin');

	//categories
		Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
		Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
		Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
		Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
				->where('id','\d+')
				->name('categories.edit');
		Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editRequestCategory')
				->where('id','\d+');

		Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');
	//articles
		Route::get('/articles', 'Admin\ArticlesController@index')->name('articles');
		Route::get('/articles/add', 'Admin\ArticlesController@addArticle')->name('articles.add');
		Route::post('/articles/add', 'Admin\ArticlesController@addRequestArticle');
		Route::get('/articles/edit/{id}', 'Admin\ArticlesController@editArticle')->where('id', '\d+')->name('articles.edit'); 
		Route::delete('/articles/delete', 'Admin\Admin\ArticlesController@deleteArticles')->name('articles.delete');
	});
});
