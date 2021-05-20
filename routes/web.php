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
    Route::delete('users/destroySelected', 'Admin\UsersController@destroySelected')
            ->name('admin.users.destroySelected');


    Route::resource('users', 'Admin\UsersController')->names('admin.users');
    Route::get('users/getAll/test', 'Admin\UsersController@getAll')->name('admin.users.getall.test');

});

//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
//    Route::resource('users', 'Admin\UsersController');
//});

