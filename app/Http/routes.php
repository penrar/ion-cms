<?php
/****************   Model binding into route **************************/
Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[0-9a-z-_]+');

/**
 * Bindings
 */
Route::bind('user', function ($value, $route) {
    return \App\User::whereId($value)->firstOrFail();
});

Route::bind('order', function($value, $route) {
    return \App\Order::whereId($value)->firstOrFail();
});

Route::bind('customer', function($value, $route) {
    return \App\Customer::whereId($value)->firstOrFail();
});

/**
 * Error 401 Unauthorized Route
 */
Route::get('errors/401', ['as' => '401', function () {
    return view('errors.401');
}]);


Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'permission:hasRole,customer'], function() {
        Route::get('orders/mine', 'OrderController@myOrders');
    });

    Route::group(['middleware' => 'admin'], function() {
        Route::get('orders', 'OrderController@index');
        Route::post('orders/search', 'OrderController@search');
        Route::get('orders/{order}', 'OrderController@show');
        Route::get('orders/{order}/edit', 'OrderController@edit');
        Route::post('orders/{order}', 'OrderController@update');
    });
});

//Route::get('order/{order}/show', 'Admin\PhotoController@show');
//Route::get('photo/{order}/edit', 'Admin\PhotoController@edit');
//Route::get('photo/{order}/delete', 'Admin\PhotoController@delete');
//Route::resource('photo', 'Admin\PhotoController');

/***************    Site routes  **********************************/
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
//Route::get('about', 'PagesController@about');
//Route::get('contact', 'PagesController@contact');
//Route::get('articles', 'ArticlesController@index');
//Route::get('article/{slug}', 'ArticlesController@show');
//Route::get('video/{id}', 'VideoController@show');
//Route::get('photo/{id}', 'PhotoController@show');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/***************    Admin routes  **********************************/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

    # Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');

    # Article category
//    Route::get('articlecategory/data', 'Admin\ArticleCategoriesController@data');
//    Route::get('articlecategory/{articlecategory}/show', 'Admin\ArticleCategoriesController@show');
//    Route::get('articlecategory/{articlecategory}/edit', 'Admin\ArticleCategoriesController@edit');
//    Route::get('articlecategory/{articlecategory}/delete', 'Admin\ArticleCategoriesController@delete');
//    Route::get('articlecategory/reorder', 'ArticleCategoriesController@getReorder');
//    Route::resource('articlecategory', 'Admin\ArticleCategoriesController');
//
//    # Articles
//    Route::get('article/data', 'Admin\ArticleController@data');
//    Route::get('article/{article}/show', 'Admin\ArticleController@show');
//    Route::get('article/{article}/edit', 'Admin\ArticleController@edit');
//    Route::get('article/{article}/delete', 'Admin\ArticleController@delete');
//    Route::get('article/reorder', 'Admin\ArticleController@getReorder');
//    Route::resource('article', 'Admin\ArticleController');
//
//    # Photo Album
//    Route::get('photoalbum/data', 'Admin\PhotoAlbumController@data');
//    Route::get('photoalbum/{photoalbum}/show', 'Admin\PhotoAlbumController@show');
//    Route::get('photoalbum/{photoalbum}/edit', 'Admin\PhotoAlbumController@edit');
//    Route::get('photoalbum/{photoalbum}/delete', 'Admin\PhotoAlbumController@delete');
//    Route::resource('photoalbum', 'Admin\PhotoAlbumController');
//
//    # Photo
//    Route::get('photo/data', 'Admin\PhotoController@data');
//    Route::get('photo/{photo}/show', 'Admin\PhotoController@show');
//    Route::get('photo/{photo}/edit', 'Admin\PhotoController@edit');
//    Route::get('photo/{photo}/delete', 'Admin\PhotoController@delete');
//    Route::resource('photo', 'Admin\PhotoController');

    # Users
    Route::get('user/data', 'Admin\UserController@data');
    Route::get('user/{user}/show', 'Admin\UserController@show');
    Route::get('user/{user}/edit', 'Admin\UserController@edit');
    Route::get('user/{user}/delete', 'Admin\UserController@delete');
    Route::resource('user', 'Admin\UserController');
});
