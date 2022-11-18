<?php

use Illuminate\Support\Facades\Route;

/*-----------------------------------HOME-------------------------------------------*/
Route::get('/', 'HomeController@index');
Route::get('/toArabic', 'SessionController@toArabic');
Route::get('/toEnglish', 'SessionController@toEnglish');
/*-----------------------------------USERS-------------------------------------------*/
Route::prefix('/users')->group(function () {
    //register
    Route::get('/register', 'UsersController@create');
    Route::post('/store', 'UsersController@store');

    //login and logout
    Route::get('/login', 'UsersController@login')->name('login');
    Route::post('/login', 'UsersController@trylogin');

    //PROTECTED LINKS
    Route::group(['middleware' => ['auth']], function () {
        //logout
        Route::get('/logout', 'UsersController@logout');
        //account
        Route::get('/myaddress', 'UsersController@myaddress');
        Route::post('/myaddress', 'UsersController@editAddress');
        Route::get('/mystores', 'UsersController@myStores');
        Route::get('/myaccount/{what}', 'UsersController@edit');
        Route::post('/edit', 'UsersController@update');
        Route::post('/restpassword', 'UsersController@resetPassword');
    });
});
/*-----------------------------------STORES-------------------------------------------*/
Route::prefix('/stores')->group(function () {
    //PROTECTED LINKS
    Route::group(['middleware' => ['auth']], function () {
        //create
        Route::get('/create', 'StoreController@create');
        Route::post('/store', 'StoreController@store');

        //store
        Route::get('/{store}/edit', 'StoreController@edit');
        Route::put('/{store}', 'StoreController@update');
        Route::get('/{store}/confirmation', 'StoreController@confirmation');
        Route::get('/{store}/delete', 'StoreController@destroy');
    });

    Route::get('/{store}/ideas', 'StoreController@ideas');
});
/*-----------------------------------IDEAS-------------------------------------------*/
Route::prefix('/ideas')->group(function () {
    //PROTECTED LINKS
    Route::group(['middleware' => ['auth']], function () {
        //create
        Route::get('/{store}/create', 'ProductController@create');
        Route::post('/{store}', 'ProductController@store');

        //edit and delete
        Route::get('/{product}/edit', 'ProductController@edit');
        Route::put('/{product}', 'ProductController@update');
        Route::get('/{product}/delete', 'ProductController@destroy');
        Route::get('/{product}/confirmation', 'ProductController@confirmation');
    });
    Route::get('/{product}', 'ProductController@show');
});
/*-----------------------------------ORDERS-----------------------------------------*/
Route::group(['prefix' => 'order', 'middleware' => 'auth'], function () {

    //view user orders
    Route::get('/myOrders', 'OrderController@index');

    //view stores orders
    Route::get('/storesOrders', 'OrderController@storesOrders');

    //add product to cart
    Route::post('/addIdea/{product}', 'OrderController@addIdea');
    //cart view
    Route::get('/myCart', 'OrderController@myCart');

    //payment
    Route::get('/chargeRequest', 'OrderController@chargeRequest');
    Route::get('/chargeUpdate', 'OrderController@chargeUpdate');
    Route::get('/cash', 'OrderController@cash');

    //show order details
    Route::get('/{order}', 'OrderController@show');
    Route::get('/{transaction_id}/details', 'OrderController@myOrdersDetails');

    //delivering confirmation
    Route::get('/{order}/shipped', 'OrderController@shipped');
    Route::get('/{order}/delivered', 'OrderController@delivered');

    //remove customer order with failure
    Route::get('/{order}/remove', 'OrderController@destroy');
});
