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


Route::get('/', 'UserController@index');

// user login  - register - logout
Route::group(['prefix' => 'user' , 'middleware' => 'web'], function () {

    Route::get('/login', 'UserController@login')->name('login');
    Route::post('/login', 'UserController@dologin')->name('dologin');
    Route::get('/register', 'UserController@register')->name('register');
    Route::post('/register', 'UserController@doregister')->name('doregister');
    Route::get('/logout', 'UserController@logout')->name('logout');
});


//dashboard
Route::group([ 'prefix' => 'dashboard' , 'middleware' => 'auth'], function () {

    Route::get('/main' , 'dashboardController@index')->name('dashboard');
    Route::get('/addwallet' , 'dashboardController@addwallet')->name('addwallet');
    Route::post('/addwallet' , 'dashboardController@doaddwallet')->name('doaddwallet');

});


