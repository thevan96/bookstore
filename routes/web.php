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

Route::get('/home/{id?}', 'HomeController@index')->name('home.index');
Route::post('/home/search', 'HomeController@search')->name('home.search');
Route::get('/home/book/{id}', 'HomeController@bookDetail')->name(
    'home.bookDetail'
);

Route::get('cart/{id}', 'CartController@addToCart')->name('cart.addToCart');
Route::delete('cart/{id}', 'CartController@removeCart')->name( 'cart.removeCart');
Route::get('cart', 'CartController@initCart')->name('cart.initCart');
Route::get('carts', 'CartController@carts')->name('cart.carts');
Route::put('carts/{rowId}', 'CartController@update')->name('cart.update');

Route::get('order', 'OrderController@index')->name('order.index');

Route::prefix('admin')->group(function () {
    Route::resource('genres', 'GenreController')->only([
        'index',
        'store',
        'show',
        'update',
        'destroy'
    ]);
    Route::resource('publishers', 'PublisherController')->only([
        'index',
        'store',
        'show',
        'update',
        'destroy'
    ]);
});
