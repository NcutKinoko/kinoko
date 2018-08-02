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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('Backstage')->group(function (){
    Route::get('/register/form','Auth\BackstageRegisterController@ShowRegisterform')->name('Backstage.show.register');
    Route::POST('/register','Auth\BackstageRegisterController@create')->name('Backstage.register');
});

