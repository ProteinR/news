<?php

use Illuminate\Http\Request;


//Register and Login for users
Route::post('auth/account', 'Auth\AccountController@store'); //register
Route::post('auth/token', 'Auth\TokenController@store'); //login


Route::group(['middleware'=>'auth:api'], function () {
    //Show, create, update, delete user
    Route::resource('auth/account', 'Auth\AccountController')->only(['update', 'show']);

    //CRUD for news
    Route::resource('/news', 'ApiNewsController')->only(['index', 'store', 'update', 'destroy']);

    //CRUD for categories
    Route::resource('/category', 'ApiCategoryController')->except(['edit', 'create']);



});

// Middleware in construct method
Route::resource('/tag', 'ApiTagController')->except(['edit', 'create']);

