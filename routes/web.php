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


Route::get('/', 'PageController@index');

Auth::routes();

// Route::get('/activation/resend','PageController@resend');

Route::get('/setting','PageController@setting')->middleware('auth');

Route::POST('/ChangeUsername','SettingController@changeUsername')->name('changeUsername');

Route::POST('/ChangePassword','SettingController@changePassword')->name('changePassword');

Route::POST('/ChangeName','SettingController@changeName')->name('changeName');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{username}','ProfileController@showProfilePage');

Route::POST('/updateAvatar','ProfileController@updateAvatar')->middleware('auth');

Route::POST('/deleteAvatar','ProfileController@deleteAvatar')->middleware('auth');

Route::get('/verify/{token}','VerifyController@verify')->name('verify');
