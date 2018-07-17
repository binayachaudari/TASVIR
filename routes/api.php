<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['web']], function () {
    Route::get('/login','apiControllers\apiLoginController@showLoginForm');
    Route::POST('/login','apiControllers\apiLoginController@login');

    Route::get('/register','Auth\RegisterController@showRegistrationForm');
    Route::POST('/register','apiControllers\apiRegisterController@register');

    Route::get('/{username}','apiControllers\apiProfileController@showProfile');
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
    //
    // Route::get;
    // Route::POST;
});
