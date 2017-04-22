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
Route::post('admin/register', 'ManagerController@register');
Route::resource('admin/manager', 'ManagerController');
Route::resource('admin/product', 'ProductController');
Route::get('admin/login', 'AdminController@login');
Route::get('admin/profile', 'AdminController@profile');
Route::post('admin/login', 'AdminController@auth');
Route::get('admin', 'AdminController@index')->middleware('check.login');
Route::get('admin/sign-out', 'AdminController@signOut');
Route::post('admin/ajax', 'AdminController@ajax');
Route::get('admin/search', 'AdminController@search');





Auth::routes();

Route::get('/home', 'HomeController@index');
