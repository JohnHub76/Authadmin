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

//Admin

Route::GET('admin/home','Admin\AdminController@index')->name('admin.home');

Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');


Route::GET('admin/album/index','Admin\AlbumController@index')->name('admin.album.index');
Route::GET('admin/album/create','Admin\AlbumController@createform')->name('admin.album.create');
Route::POST('admin/album/create','Admin\AlbumController@store');
Route::GET('admin/album/{albumid}/edit','Admin\AlbumController@edit')->name('admin.album.edit');
Route::POST('admin/album/{albumid}','Admin\AlbumController@update')->name('admin.album.update');
Route::DELETE('admin/album/{albumid}','Admin\AlbumController@destroy')->name('admin.album.destroy');

Route::resource('admin/slider', 'Admin\SliderController');
Route::resource('admin/offer', 'Admin\OfferController');
Route::resource('admin/albumimages', 'Admin\AlbumimageController');