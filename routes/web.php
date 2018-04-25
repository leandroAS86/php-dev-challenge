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
        'uses' => 'ProductsController@index',
        'as' => 'index',
  ]);

Route::group(['as' => 'prod.', 'prefix' => 'products'], function(){
    Route::get('/', [
        'as' => 'index', 
        'uses' => 'ProductsController@index'
    ]);

    Route::post('products', [        
        'as' => 'store', 
        'uses' => 'ProductsController@store'
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
});
/*
Route::get('/products', function () {
    return view('products');
});
