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

//Register and Login for users
Route::post('auth/account', 'Auth\AccountController@store'); //register
Route::post('auth/token', 'Auth\TokenController@store'); //login


Route::group(['middleware'=>'auth:api'], function () {
    //Show, create, update, delete user
    Route::resource('auth/account', 'Auth\AccountController')->only(['update', 'show']);
});

//CRUD for wishes
Route::resource('/wishes', 'ApiWishController');

