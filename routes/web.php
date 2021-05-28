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

//Админка
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isadmin'], ], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    //Массовое удаление записей
    Route::delete('users/destroySelected', 'Admin\UsersController@destroySelected')
        ->name('admin.users.destroySelected');

    Route::resource('users', 'Admin\UsersController')
            ->names('admin.users');

    //Войти в режим "Login As"
    Route::get('impersonate/user/{id}', 'Admin\ImpersonateController@index')->name('admin.impersonate');

    Route::delete('categories/destroySelected', 'Admin\PhotoCategoriesController@destroySelected')
        ->name('admin.categories.destroySelected');

    Route::resource('categories', 'Admin\PhotoCategoriesController')
            ->names('admin.categories');

    Route::resource('photos', 'Admin\PhotosController')
            ->names('admin.photos');
});

//Выйти из режима "Login As"
Route::get('admin/impersonate/destroy', 'Admin\ImpersonateController@destroy')->name('admin.impersonate.destroy');
