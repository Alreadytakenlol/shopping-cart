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

Route::get('/', [
    'uses'=>'ProductController@getIndex',
    'as'=> 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses'=>'ProductController@getAddToCart',
    'as'=> 'product.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses'=>'ProductController@getReduceByOne',
    'as'=> 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses'=>'ProductController@getRemoveItem',
    'as'=> 'product.remove'
]);

Route::get('/shopping-cart', [
    'uses'=>'ProductController@getCart',
    'as'=> 'product.shoppingCart',
    'middleware'=> 'auth'
]);

Route::get('/choosemethod', [
    'uses'=>'ProductController@getChooseMethod',
    'as'=> 'choosemethod',
    'middleware'=> 'auth'
]);

Route::get('/stripe', [
    'uses'=>'ProductController@getStripe',
    'as'=> 'stripe',
    'middleware'=> 'auth'
]);

Route::post('/stripepayment', [
    'uses'=>'ProductController@postStripePayment',
    'as'=> 'stripepayment',
    'middleware'=> 'auth'
]);

Route::get('/checkout', [
    'uses'=>'ProductController@getCheckout',
    'as'=> 'checkout',
    'middleware'=> 'auth'
]);

Route::get('/product/{id}', [
    'uses'=>'ProductController@getProduct',
    'as'=> 'product.product'   
]);

Route::group(['prefix'=>'user'],function(){

    Route::get('/signup', [
        'uses'=>'UserController@getSignUp',
        'as'=> 'user.signup',
        'middleware'=>'guest'
    ]);

    Route::post('/signup', [
        'uses'=>'UserController@postSignUp',
        'as'=> 'user.signup',
        'middleware'=>'guest'
    ]);
    
    Route::get('/signin', [
        'uses'=>'UserController@getSignIn',
        'as'=> 'user.signin',
        'middleware'=>'guest'
    ]);
    
    Route::post('/signin', [
        'uses'=>'UserController@postSignIn',
        'as'=> 'user.signin',
        'middleware'=>'guest'
    ]);
    
    Route::get('/profile', [
        'uses'=>'UserController@getProfile',
        'as'=> 'user.profile',
        'middleware'=>'auth'
    ]);
    
    Route::get('/logout', [
        'uses'=>'UserController@getLogout',
        'as'=> 'user.logout',
        'middleware'=>'auth'
    ]);



});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
