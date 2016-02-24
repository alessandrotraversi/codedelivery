<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth.checkrole:admin', 'as'=>'admin.'], function () {
    Route::group(['prefix'=>'categories', 'as'=>'categories.'], function () {
        Route::get('', ['as'=>'index', 'uses'=>'CategoriesController@index']);
        Route::get('/create', ['as'=>'create', 'uses'=>'CategoriesController@create']);
        Route::get('/edit/{id}', ['as'=>'edit', 'uses'=>'CategoriesController@edit']);
        Route::post('/store', ['as'=>'store', 'uses'=>'CategoriesController@store']);
        Route::post('/update/{id}', ['as'=>'update', 'uses'=>'CategoriesController@update']);
    });
    Route::group(['prefix'=>'products', 'as'=>'products.'], function () {
        Route::get('', ['as'=>'index', 'uses'=>'ProductsController@index']);
        Route::get('/create', ['as'=>'create', 'uses'=>'ProductsController@create']);
        Route::get('/edit/{id}', ['as'=>'edit', 'uses'=>'ProductsController@edit']);
        Route::post('/store', ['as'=>'store', 'uses'=>'ProductsController@store']);
        Route::post('/update/{id}', ['as'=>'update', 'uses'=>'ProductsController@update']);
        Route::get('/destroy/{id}', ['as'=>'destroy', 'uses'=>'ProductsController@destroy']);
    });
    Route::group(['prefix'=>'clients', 'as'=>'clients.'], function () {
        Route::get('', ['as'=>'index', 'uses'=>'ClientsController@index']);
        Route::get('/create', ['as'=>'create', 'uses'=>'ClientsController@create']);
        Route::get('/edit/{id}', ['as'=>'edit', 'uses'=>'ClientsController@edit']);
        Route::post('/store', ['as'=>'store', 'uses'=>'ClientsController@store']);
        Route::post('/update/{id}', ['as'=>'update', 'uses'=>'ClientsController@update']);
    });
    
    Route::group(['prefix'=>'orders', 'as'=>'orders.'], function () {
        Route::get('', ['as'=>'index', 'uses'=>'OrdersController@index']);
        Route::get('/edit/{id}', ['as'=>'edit', 'uses'=>'OrdersController@edit']);
        Route::post('/update/{id}', ['as'=>'update', 'uses'=>'OrdersController@update']);
    });
    
    Route::group(['prefix'=>'cupoms', 'as'=>'cupoms.'], function () {
        Route::get('', ['as'=>'index', 'uses'=>'CupomsController@index']);
        Route::get('/create', ['as'=>'create', 'uses'=>'CupomsController@create']);
        Route::get('/edit/{id}', ['as'=>'edit', 'uses'=>'CupomsController@edit']);
        Route::post('/store', ['as'=>'store', 'uses'=>'CupomsController@store']);
        Route::post('/update/{id}', ['as'=>'update', 'uses'=>'CupomsController@update']);
    });
});


Route::group(['prefix'=>'costumer', 'middleware'=>'auth.checkrole:client', 'as'=>'costumer.'], function () {
    Route::get('/order', ['as'=>'order.index', 'uses'=>'CheckoutController@index']);
    Route::get('/order/create', ['as'=>'order.create', 'uses'=>'CheckoutController@create']);
    Route::post('/order/store', ['as'=>'order.store', 'uses'=>'CheckoutController@store']);
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['prefix'=>'api', 'middleware'=>'oauth', 'as'=>'api.'], function () {
    Route::get('richiesta', function(){
        return[
            'id'=>1,
            'client'=>'Ale',
            'total'=>10
        ];
    });
    Route::get('/test', ['as'=>'test', 'uses'=>'CheckoutController@index']);
});