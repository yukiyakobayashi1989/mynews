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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    //php/Laravel 15
    Route::get('news', 'Admin\NewsController@index');//追記
    Route::get('news/edit', 'Admin\NewsController@edit');//追記
    Route::post('news/edit', 'Admin\NewsController@update');//追記
    //php/Laravel 16
    Route::get('news/delete', 'Admin\NewsController@delete');//追記
});

//以下php/Lalavel 09課題
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create','Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    
    //php/Laravel 16課題
   Route::get('profile', 'Admin\ProfileController@index');//追記
   
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth'); // 追記
});
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//php/Laravel 19 追記
Route::get('/', 'Newscontroller@index');
//php/Laravel 19 課題
Route::get('/profile', 'ProfileController@index');