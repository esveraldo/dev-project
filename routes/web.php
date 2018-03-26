<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'password'], function() {
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
    Route::get('reseted', 'Auth\ResetPasswordController@reseted')->name('password.reseted');
});

Route::get('list/{token}', 'Web\ListController@share')->name('share.list');
Route::get('product/{id}', 'Web\ProductController@share')->name('share.product');

Auth::routes();

Route::group(['middleware' => ['auth', 'status']], function () {
    Route::get('/', 'Web\DashboardController@index')->name('index');
    Route::get('/home', 'Web\DashboardController@index')->name('home');

    Route::resource('categories', 'Web\CategoryController');

    Route::resource('campaigns', 'Web\CampaignController');
    Route::post('campaigns/show-user', 'Web\CampaignController@showUser');

    Route::resource('users', 'Web\UserController');
    Route::get('users/status/{user_id}', 'Web\UserController@status')->name('users.status');
    Route::post('users/points', 'Web\UserController@points')->name('users.points');

    Route::resource('products', 'Web\ProductController');
    Route::get('products/{product_id}/status', 'Web\ProductController@status')->name('products.status');
    Route::get('products/{product_id}/image/{image_id}', 'Web\ProductController@imageDestroy')->name('products.image.destroy');

    Route::resource('groups', 'Web\GroupController');
    Route::get('groups/{group_id}/status', 'Web\GroupController@status')->name('groups.status');

    Route::resource('brands', 'Web\BrandController');
    Route::get('brands/{brand_id}/status', 'Web\BrandController@status')->name('brands.status');

    Route::resource('tags', 'Web\TagController');
    Route::get('tags/{tag_id}/status', 'Web\TagController@status')->name('tags.status');

    Route::resource('offers', 'Web\OfferController');
    Route::get('offers/{status_id}/status', 'Web\OfferController@status')->name('offers.status');
    Route::post('offers/{offer_id}/send', 'Web\OfferController@send')->name('offers.send');

    Route::resource('encartes', 'Web\EncarteController');
    Route::get('encartes/{status_id}/status', 'Web\EncarteController@status')->name('encartes.status');

    Route::post('messages/users', 'Web\MessagingController@send')->name('messages.send');
    Route::post('messages', 'Web\MessagingController@sendAll')->name('messages.send.all');

    Route::resource('messagings', 'Web\MessagingController');
    Route::post('messagings/{messaging_id}/send', 'Web\MessagingController@send')->name('messagings.send');

    Route::resource('stores', 'Web\StoreController');
    Route::get('stores/{store_id}/status', 'Web\StoreController@status')->name('stores.status');
    Route::get('stores/location/{address?}', 'Web\StoreController@location')->name('stores.location');
    Route::get('store/{store_id}/offers/ajax', 'Web\StoreController@offersAjax')->name('store.offers.ajax');

    Route::resource('banners', 'Web\BannerController');
    Route::get('banners/{banner_id}/status', 'Web\BannerController@status')->name('banners.status');

    Route::resource('terms', 'Web\TermController', ['only' => ['edit', 'update']]);
    Route::resource('about', 'Web\AboutController', ['only' => ['edit', 'update']]);

    Route::resource('admin', 'Web\AdminController')->middleware('admin');
    Route::get('admin/{admin_id}/status', 'Web\AdminController@status')->name('admin.status')->middleware('admin');

    Route::resource('profiles', 'Web\ProfileController');

    Route::resource('lists', 'Web\ListController');
    Route::get('list/{list_id}/products/ajax', 'Web\ListController@productsAjax')->name('list.products.ajax');
    Route::post('lists/send/users', 'Web\ListController@send')->name('lists.send');

    Route::get('imports/products', 'Web\ImportProductController@index')->name('imports.products.index');
    Route::post('imports/products', 'Web\ImportProductController@store')->name('imports.products.store');

    Route::get('imports/sales', 'Web\ImportSaleController@index')->name('imports.sales.index');
    Route::post('imports/sales', 'Web\ImportSaleController@store')->name('imports.sales.store');
});




