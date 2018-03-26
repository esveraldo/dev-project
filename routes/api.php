<?php

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

Route::group(['prefix' => 'v1'], function(){
    Route::group(['prefix' => 'auth'], function(){
        Route::post('/login', 'Auth\AuthController@login')->name('auth.login');
        Route::post('/logout', 'Auth\AuthController@logout')->name('auth.logout');
        Route::post('/register', 'Auth\AuthController@register')->name('auth.register');
        Route::post('/login/facebook', 'Auth\AuthController@loginFacebook')->name('auth.fb');
    });

    Route::get('/statistics', 'Api\StatisticController@index')->name('statistics.index');

    Route::get('/users', 'Api\UserController@index')->name('users.index');
    Route::get('/users/{id}', 'Api\UserController@show')->name('users.show');
    Route::get('/users/email/{email}', 'Api\UserController@showByEmail')->name('users.show.email');
    Route::post('/users/{id}', 'Api\UserController@update')->name('users.update');
    Route::delete('/users/{id}', 'Api\UserController@destroy')->name('users.destroy');
    Route::get('/users/{id}/lists', 'Api\UserController@lists')->name('users.list');
    Route::get('/users/{user_id}/lists/{list_id}', 'Api\UserController@productsOnList')->name('users.list.products');
    Route::get('/users/{user_id}/offers', 'Api\UserController@offers')->name('users.offers');

    Route::get('/products', 'Api\ProductController@index')->name('products.index');
    Route::get('/products/{id}/type/{type}', 'Api\ProductController@show')->name('products.store');
    Route::get('/products/{id}/similar', 'Api\ProductController@similarProducts')->name('products.similar');
    Route::get('/products/{product_id}/brand/{brand_id}/type/{type}', 'Api\ProductController@sameBrand')->name('products.same');
    Route::delete('/products/{id}', 'Api\ProductController@destroy')->name('products.destroy');
    Route::post('/products/catalog', 'Api\ProductController@catalog')->name('products.catalog');

    Route::get('/lists', 'Api\ListController@index')->name('lists.index');
    Route::get('/lists/{id}', 'Api\ListController@show')->name('lists.show');
    Route::post('/lists', 'Api\ListController@store')->name('lists.store');
    Route::post('/lists/{id}', 'Api\ListController@update')->name('lists.update');
    Route::post('/lists/{id}/products', 'Api\ListController@addProduct')->name('lists.add.product');
    Route::post('/lists/{list_id}/products/{product_id}', 'Api\ListController@removeProduct')->name('lists.rm.product');
    Route::get('/lists/{id}/share', 'Api\ListController@share')->name('lists.share');
    Route::delete('/lists/{id}', 'Api\ListController@destroy')->name('lists.destroy');

    Route::get('/offers', 'Api\OfferController@index')->name('offers.index');
    Route::get('/offers/{offer_id}/users/{user_id}', 'Api\OfferController@codebar')->name('offer.codebar');

    Route::get('/loyalty/{user_id}', 'Api\LoyaltyController@card')->name('loyalty.card');

    Route::get('/categories', 'Api\CategoryController@index')->name('categories.index');

    Route::get('/groups', 'Api\GroupController@index')->name('groups.index');
    Route::get('/groups/{id}', 'Api\GroupController@show')->name('groups.show');

    Route::get('/stores', 'Api\StoreController@index')->name('stores.index');
    Route::get('/stores/{id}', 'Api\StoreController@show')->name('stores.show');

    Route::get('/texts', 'Api\TextController@index')->name('texts.index');
    Route::get('/texts/{id}', 'Api\TextController@show')->name('texts.show');

    Route::get('/banners', 'Api\BannerController@index')->name('banners.index');
    Route::get('/banners/{type}', 'Api\BannerController@getBannerByType')->name('banners.type');

    Route::get('/locations', 'Api\LocationController@index')->name('locations.index');
    Route::get('/locations/{id}', 'Api\LocationController@show')->name('locations.show');
    Route::post('/locations', 'Api\LocationController@store')->name('locations.store');

    Route::middleware(['jwt.auth'])->group(function () {
       //
    });
});

