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




Route::group(['middleware' => 'auth'], function () {
    Route::get('word', 'WordController@show');
    Route::post('wordadd', 'WordController@store');
    Route::get('word/edit/{id}', 'WordController@edit');
    Route::post('wordupdate', 'WordController@update');
    Route::get('worddelete/{id}', 'WordController@destroy');
    Route::post('massdelete', 'WordController@massdelete');
});
