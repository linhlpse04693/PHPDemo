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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin',function (){
    return 'admin';
})->middleware(['auth','auth.admin']);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/requests','RequestController', ['except'=>['show','create','store']]);
    Route::post('/requests/{id}', 'RequestController@update')->name('request.');
});

Route::namespace('User')->prefix('user')->name('user.')->group(function (){
    Route::resource('/requests','RequestController');
    Route::post('/requests/{id}', 'RequestController@update')->name('request.');
});
