<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    //COMERCIO
    route::get('comercio/source/{user}', 'Web\ComercioController@source')->name('comercio.source');
    route::resource('comercio', 'Web\ComercioController');

    //Cbu
    route::get('cbu/source/{comercio}', 'Web\CbuController@source')->name('cbu.source');
    route::get('cbu/{comercio}', 'Web\CbuController@lista')->name('cbu.lista');
    route::resource('cbu', 'Web\CbuController');


});
