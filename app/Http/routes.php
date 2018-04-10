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

    Route::group(['middleware' => 'permission:atLeast,30'], function() {
        Route::get('orders', 'OrderController@index')->name('order.index');
        Route::post('orders/search', 'OrderController@search')->name('order.search');
        Route::get('orders/{order}', 'OrderController@show')->name('order.show');
        Route::get('orders/{order}/edit', 'OrderController@edit')->name('order.edit');
        Route::patch('orders/{order}', 'OrderController@update')->name('order.update');
        // contact
        Route::get('order/{order}/contacts/edit', 'ContactController@edit')->name('contact.edit');
        Route::patch('order/{order}/contacts', 'ContactController@update')->name('contact.update');
        // company
        Route::get('order/{order}/company/edit', 'CompanyController@edit')->name('company.edit');
        Route::patch('order/{order}/company/', 'CompanyController@update')->name('company.update');
        // property
        Route::get('order/{order}/property/edit', 'PropertyController@edit')->name('property.edit');
        Route::patch('order/{order}/property/', 'PropertyController@update')->name('property.update');
    });
});

/***************    Site routes  **********************************/
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

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
