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

Route::bind('property', function($value, $route) {
    return \App\Property::whereId($value)->firstOrFail();
});

Route::bind('company', function($value, $route) {
    return \App\Company::whereId($value)->firstOrFail();
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
        Route::get('orders', 'OrderController@index')->name('order.index');
        Route::post('orders/search', 'OrderController@search')->name('order.search');
        Route::get('orders/{order}', 'OrderController@show')->name('order.show');
        Route::get('orders/{order}/edit', 'OrderController@edit')->name('order.edit');
        Route::post('orders/{order}', 'OrderController@update')->name('order.update');
        // contact
        Route::get('order/{order}/contacts/{contact}/edit', 'ContactController@edit')->name('contact.edit');
        Route::post('order/{order}/contacts/{contact}', 'ContactController@update')->name('contact.update');
        // company
        Route::get('order/{order}/company/{contact}/edit', 'CompanyController@edit')->name('company.edit');
        Route::post('order/{order}/company/{contact}', 'CompanyController@update')->name('company.update');
        // property
        Route::get('order/{order}/property/{property}/edit', 'PropertyController@edit')->name('property.edit');
        Route::post('order/{order}/property/{property}', 'PropertyController@update')->name('property.update');
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

    # Users
    Route::get('user/data', 'Admin\UserController@data');
    Route::get('user/{user}/show', 'Admin\UserController@show');
    Route::get('user/{user}/edit', 'Admin\UserController@edit');
    Route::get('user/{user}/delete', 'Admin\UserController@delete');
    Route::resource('user', 'Admin\UserController');
});
