<?php

use Illuminate\Http\Request;


//Register and Login for users
Route::post('auth/account', 'Auth\AccountController@store'); //register
Route::post('auth/token', 'Auth\TokenController@store'); //login

// Show all news, tags and categories
Route::get('/', 'ApiNewsController@index'); // show all news
Route::resource('/news', 'ApiNewsController')->only(['index', 'show']);

Route::get('/news/category/{category}' , 'ApiNewsController@newsWithCategory'); // Show all news with category
Route::get('/news/tag/{tag}' , 'ApiNewsController@newsWithTag'); // Show all news with tag
Route::get('/news/top/{count}', 'ApiNewsController@topNews'); //get count top news (for example get top 5 news)
Route::get('/news/user/{user}' , 'ApiNewsController@newsWithUser'); // Show all news with user
Route::get('/news/{news}/comments' , 'ApiCommentController@getComments'); // Show all news comments
Route::resource('/tag', 'ApiTagController')->only(['index']);
Route::resource('/category', 'ApiCategoryController')->only(['index']);



Route::group(['middleware'=>'auth:api'], function () {

    //Show and delete users
    Route::resource('user', 'ApiUserController')->only(['index','update', 'destroy']);

    //CRUD for news
    Route::resource('/news', 'ApiNewsController')->except(['index', 'create', 'edit', 'show']);

    // CRUD for categories
    Route::resource('/category', 'ApiCategoryController')->except(['index', 'create', 'edit']);

    // CRUD for tags
    Route::resource('/tag', 'ApiTagController')->except(['index', 'create', 'edit', 'show']);

    // CRUD for comments
    Route::resource('/comment', 'ApiCommentController')->except(['index', 'create', 'edit', 'show']);

    // Add like to comment
    Route::post('comment/{comment}', 'ApiCommentController@incrementLike');

    //Show user profile
    Route::get('user/{user}', 'ApiUserController@show'); //Show user profile

});


