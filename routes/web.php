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

use Illuminate\Support\Facades\Route;

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
    Route::get('/show/sendmail','Auth\BackstageForgotPasswordController@ShowSendMailform')->name('Backstage.show.sendmail');
    Route::POST('/sendmail','Auth\BackstageForgotPasswordController@SendMail')->name('Backstage.sendmail');
    Route::get('/password/reset/{token}','Auth\BackstageResetPasswordController@showResetForm')->name('Backstage.show.reset');
    Route::POST('/password/reset','Auth\BackstageResetPasswordController@reset')->name('Backstage.reset');
});

Route::prefix('product')->group(function (){
    Route::get('/create/form','ProductController@create')->name('show.product.form');
    Route::POST('/store','ProductController@store')->name('store.product');
    Route::get('/update/form/{id}','ProductController@edit')->name('show.product.updateForm');
    Route::POST('/update/{id}','ProductController@update')->name('update.product');
    Route::delete('/destroy/{id}','ProductController@destroy')->name('destroy.product');
    Route::get('/list','ProductController@index')->name('product.list');
    Route::get('/detail/{id}','ProductController@detail')->name('product.detail');
});

Route::prefix('category')->group(function (){
    Route::get('/create/form','CategoryController@create')->name('show.category.form');
    Route::POST('/store','CategoryController@store')->name('store.category');
    Route::POST('/destroy','CategoryController@destroy')->name('destroy.category');
});

Route::prefix('menu')->group(function (){
    Route::get('/create/form','MenuController@create')->name('show.menu.form');
    Route::POST('/store','MenuController@store')->name('store.menu');
    Route::delete('/destroy/{id}','MenuController@destroy')->name('destroy.menu');
});

Route::prefix('step')->group(function (){
    Route::POST('/store','StepController@store')->name('store.step');
    Route::POST('/destroy','StepController@destroy')->name('destroy.step');
    Route::POST('/update','StepController@update')->name('update.step');
});

Route::prefix('kinoko')->group(function (){
    Route::get('/create/form','KinokoController@create')->name('show.kinoko.form');
    Route::POST('/store','KinokoController@store')->name('store.kinoko');
    Route::delete('/destroy/{id}','KinokoController@destroy')->name('destroy.kinoko');
    Route::get('/update/form/{id}','KinokoController@edit')->name('show.kinoko.updateForm');
    Route::POST('/update/{id}','KinokoController@update')->name('update.kinoko');
});

Route::prefix('RatingDescription')->group(function (){
    Route::POST('/store','RatingDescriptionController@store')->name('store.kinoko.RatingDescription');
    Route::POST('/destroy','RatingDescriptionController@destroy')->name('destroy.kinoko.RatingDescription');
    Route::POST('/update','RatingDescriptionController@update')->name('update.kinoko.RatingDescription');
});

Route::prefix('farmer')->group(function (){
    Route::get('/create/form','FarmerController@create')->name('show.farmer.form');
    Route::POST('/store','FarmerController@store')->name('store.farmer');
    Route::get('/update/form/{id}','FarmerController@edit')->name('show.farmer.updateForm');
    Route::POST('/update/{id}','FarmerController@update')->name('update.farmer');
    Route::delete('/destroy/{id}','FarmerController@destroy')->name('destroy.farmer');
});
