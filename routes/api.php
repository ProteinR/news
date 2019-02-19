<?php

use Illuminate\Http\Request;


//Register and Login for users
Route::post('auth/account', 'Auth\AccountController@store'); //register
Route::post('auth/token', 'Auth\TokenController@store'); //login

// Show all news, tags and categories
Route::resource('/news', 'ApiNewsController')->only(['index', 'show']);
Route::resource('/tag', 'ApiTagController')->only(['index']);
Route::resource('/category', 'ApiCategoryController')->only(['index']);


Route::group(['middleware'=>'auth:api'], function () {

    //Show and delete users
    Route::resource('user', 'ApiUserController')->only(['index','update', 'show', 'destroy']);

    //CRUD for news
    Route::resource('/news', 'ApiNewsController')->except(['index', 'create', 'edit', 'show']);

    // CRUD for categories
    Route::resource('/category', 'ApiCategoryController')->except(['index', 'create', 'edit']);

    // CRUD for tags
    Route::resource('/tag', 'ApiTagController')->except(['index', 'create', 'edit', 'show']);

    // CRUD for comments
    Route::resource('/comment', 'ApiCommentController')->except(['index', 'create', 'edit', 'show']);
});


