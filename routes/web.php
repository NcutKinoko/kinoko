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

Route::get('/index',function (){
    return view('index.index');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('Logout_New');

Route::prefix('Backstage')->group(function (){
    Route::get('/register/form','Auth\BackstageRegisterController@ShowRegisterform')->name('Backstage.show.register');
    Route::get('/login','Auth\BackstageLoginController@ShowLoginform')->name('Backstage.show.login');
    Route::POST('/login','Auth\BackstageLoginController@login')->name('Backstage.login');
    Route::POST('/register','Auth\BackstageRegisterController@create')->name('Backstage.register');
    Route::get('/home', 'BackstageController@index')->name('Backstage.home');
});

