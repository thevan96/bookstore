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

Auth::routes();

Route::prefix('')->group(function () {
    Route::get('/cart', 'HomeController@cart')->name('home.cart');
    Route::get('/{id?}', 'HomeController@index')->name('home.index');
    Route::get('/detail/{id}', 'HomeController@show')->name('home.show');
    Route::get('/genre/{id}', 'HomeController@genre')->name('home.genre');
    Route::post('/search', 'HomeController@search')->name('home.search');
});

Route::prefix('cart')->group(function () {
    Route::get('/initCart', 'CartController@initCart')->name('cart.initCart');
    Route::get('/{id}', 'CartController@addToCart')->name('cart.addToCart');
    Route::delete('/{id}', 'CartController@removeCart')->name(
        'cart.removeCart'
    );
    Route::put('/{rowId}', 'CartController@update')->name('cart.update');
});

Route::prefix('order')->group(function () {
    Route::get('/index', 'OrderController@index')->name('order.index');
    Route::post('/create', 'OrderController@store')->name('order.store');
});


Route::prefix('admin')->group(function () {

    Route::resource('genres', 'GenreController')->only([
        'index',
        'store',
        'show',
        'update',
        'destroy'
    ])->middleware('auth');

    Route::resource('publishers', 'PublisherController')->only([
        'index',
        'store',
        'show',
        'update',
        'destroy'
    ])->middleware('auth');

    Route::resource('books', 'BookController')->only([
        'index',
        'create',
        'store',
        'edit',
        'show',
        'update',
        'destroy'
    ])->middleware('auth');


});

    Route::put('book/{id}', 'BookController@update')->name('aaa');

