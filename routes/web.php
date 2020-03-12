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
    Route::get('/carts', 'HomeController@carts')->name('home.carts');
    Route::get('/{id?}', 'HomeController@index')->name('home.index');
    Route::get('/detail/{id}', 'HomeController@show')->name('home.show');
    Route::get('/genre/{id}', 'HomeController@genre')->name('home.genre');
    Route::post('/search', 'HomeController@search')->name('home.search');
});

Route::prefix('cart')->group(function () {
    Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
    Route::post('/login', 'CartController@login')->name('cart.login');
    Route::post('/create', 'CartController@store')->name('cart.store');
    Route::get('/initCart', 'CartController@initCart')->name('cart.initCart');
    Route::get('/{id}', 'CartController@addToCart')->name('cart.addToCart');
    Route::delete('/{id}', 'CartController@removeCart')->name(
        'cart.removeCart'
    );
    Route::put('/{rowId}', 'CartController@update')->name('cart.update');
});

Route::prefix('admin')->group(function () {
    Route::resource('genres', 'GenreController')
        ->only(['index', 'store', 'show', 'update', 'destroy'])
        ->middleware('auth');

    Route::resource('publishers', 'PublisherController')
        ->only(['index', 'store', 'show', 'update', 'destroy'])
        ->middleware('auth');

    Route::resource('books', 'BookController')
        ->only([
            'index',
            'create',
            'store',
            'edit',
            'show',
            'update',
            'destroy'
        ])
        ->middleware('auth');
    Route::resource('orders', 'OrderController')->middleware('auth');
});
