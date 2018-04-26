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
        'as' => 'index',
        'uses' => 'HomeController@index'
    ]);


Route::group(['as' => 'polvo.', 'prefix' => 'home'], function(){
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);

    Route::get('show', [        
        'as' => 'show', 
        'uses' => 'HomeController@show'
    ]);
});

Route::group(['as' => 'prod.', 'prefix' => 'products'], function(){
    Route::get('/', [
        'as' => 'index', 
        'uses' => 'ProductsController@index'
    ]);

    Route::get('{key}/formupdate', [
        'as' => 'formupdate', 
        'uses' => 'ProductsController@formUpdate'
    ]);

    Route::post('products', [        
        'as' => 'store', 
        'uses' => 'ProductsController@store'
    ]);

    Route::post('{key}/update', [        
        'as' => 'update', 
        'uses' => 'ProductsController@update'
    ]);

    Route::get('{key}/delete', [        
        'as' => 'delete', 
        'uses' => 'ProductsController@delete'
    ]);
});

Route::group(['as' => 'ord.', 'prefix' => 'orders'], function(){
    Route::get('/', [
        'as' => 'index', 
        'uses' => 'OrdersController@index'
    ]);

    Route::post('orders', [
        'as' => 'store', 
        'uses' => 'OrdersController@store'
    ]);

    Route::get('{key}/delete', [        
        'as' => 'delete', 
        'uses' => 'OrdersController@delete'
    ]);
});