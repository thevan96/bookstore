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

Route::prefix('admin')->group(function () {
    Route::resource('genres', 'GenreController')->only([
        'index', 'store','show','update','destroy'
    ]);
    Route::resource('publishers', 'PublisherController')->only([
        'index', 'store','show','update','destroy'
    ]);
});
