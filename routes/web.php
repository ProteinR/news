<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Web" middleware group. Now create something great!
|
*/


// Route group for Web

// Regoster/login page
Route::get('/register', function () {
    return view('pages.register');
});
Route::get('/login', function () {
    return view('pages.login');
});


// Index page - List of all news
Route::get('/', function () {
    return view('pages.index');
});

// Show news (post)
Route::get('/news/{id}', function () {
    return view('pages.newsShow');
});

// Show all news with category
Route::get('/news/category/{id}', function () {
    return view('pages.newsWithCategory');
});

// Show all news with tag
Route::get('/news/tag/{id}', function () {
    return view('pages.newsWithTag');
});

// Show all news with user
Route::get('/news/user/{id}', function () {
    return view('pages.newsWithUser');
});

// Show user profile
Route::get('/user/{id}', function () {
    return view('pages.userProfile');
});