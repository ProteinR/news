<?php


// Route group for Web

// Login page for staff
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('showAdminLoginForm');
Route::post('/admin/login', 'Auth\LoginController@login')->name('login');

// Staff group function
Route::group(['prefix' => 'admin', 'middleware' => 'role:admin|moderator|publisher'], function () {
    // Admin index page
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    // Staff logout
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::resource('/news', 'Admin\NewsController')->except('show');

    //Resource for different groups of users
    Route::resource('/staff', 'Admin\StaffController')->except('show');
    Route::resource('/users', 'Admin\UserController');

    // All banned users
    Route::get('/banned', 'Admin\UserController@banned')->name('users.banned');

    //Give role ban to user
    Route::post('/ban/{user}', 'Admin\UserController@ban')->name('user.ban');

    Route::resource('/comment', 'Admin\CommentController');
    Route::resource('/tags', 'Admin\TagController')->except('create', 'edit', 'update', 'store', 'show');
    Route::resource('/category', 'Admin\CategoryController')->except('edit', 'update', 'show');

});

// Register/login page
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

