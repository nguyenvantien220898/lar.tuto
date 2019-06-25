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

/**
 * route cho admin
 *
 */

Route::prefix('admin')->group(function (){
    //gom nhóm các route trong phần admin

    Route::get('/','AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');
    Route::get('register','AdminController@create')->name('admin.register');
    Route::post('register','AdminController@store')->name('admin.register.store');
});