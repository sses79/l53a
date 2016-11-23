<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'],function () {
    Route::get('/', ['uses' => 'Admin\AdminController@index']);
    Route::get('give-role-permissions', 'Admin\AdminController@getGiveRolePermissions');
    Route::post('give-role-permissions', 'Admin\AdminController@postGiveRolePermissions');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('users', 'Admin\UsersController');
});

//Route::get('admin', 'Admin\AdminController@index');
//Route::get('admin/give-role-permissions', 'Admin\AdminController@getGiveRolePermissions');
//Route::post('admin/give-role-permissions', 'Admin\AdminController@postGiveRolePermissions');
//Route::resource('admin/roles', 'Admin\RolesController');
//Route::resource('admin/permissions', 'Admin\PermissionsController');
//Route::resource('admin/users', 'Admin\UsersController');

//passport & auth:make
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('front/news', 'Front\\NewsController');