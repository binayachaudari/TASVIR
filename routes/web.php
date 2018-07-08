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

Route::get('/discover','PhotosController@Discover');

Route::get('{album_id}/editAlbum','AlbumsController@showEditAlbumForm')->middleware('auth');

Route::POST('{album_id}/editAlbum','AlbumsController@editAlbum')->middleware('auth');

Route::POST('{album_id}/deleteAlbum','AlbumsController@Destroy')->middleware('auth');

Route::get('/{username}','ProfileController@showProfilePage');

Route::get('/{username}/createAlbum','AlbumsController@showAlbumCreateForm')->middleware('auth');

Route::POST('/{username}/createAlbum','AlbumsController@createAlbum')->middleware('auth');

Route::get('/{username}/showAllalbums','PhotosController@showAllAlbumsForm')->middleware('auth');

Route::get('/{username}/{album_id}/uploadPhoto','PhotosController@showPhotoUploadForm')->middleware('auth');

Route::POST('/{username}/{album_id}/uploadPhoto','PhotosController@uploadPhoto')->middleware('auth');

Route::get('/albums/{album_id}/{album_title}','AlbumsController@show');

Route::get('/albums/{album_id}/{photo_id}/editPhoto','PhotosController@showPhotoEditForm')->middleware('auth');

Route::POST('/albums/{album_id}/{photo_id}/editPhoto','PhotosController@editPhoto')->middleware('auth');

Route::POST('/albums/{album_id}/{photo_id}/deletePhoto','PhotosController@Destroy')->middleware('auth');

Route::POST('/updateAvatar','ProfileController@updateAvatar')->middleware('auth');

Route::POST('/deleteAvatar','ProfileController@deleteAvatar')->middleware('auth');

Route::get('/verify/{token}','VerifyController@verify')->name('verify');
