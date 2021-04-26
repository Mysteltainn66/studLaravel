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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isadmin'], ], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('users', 'Admin\UsersController');

    Route::resource('/categories', 'CategoryController');

    Route::get('/products/restore/{id}', 'ProductController@restore')->name('products.restore');
    Route::get('/products/trashed', 'ProductController@showTrashedProducts')->name('products.trashed');
    Route::resource('/products', 'ProductController');
});

//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
//    Route::resource('users', 'Admin\UsersController');
//});

