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

Route::get('/', function () {
    phpinfo();
});
//
//Route::resource('/wishes', 'WishController');
//Route::resource('/users', 'UserController');
