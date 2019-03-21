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

    //WordComtroller routes
    Route::get('word', 'WordController@show');
    Route::post('wordadd', 'WordController@store');
    Route::get('word/edit/{id}', 'WordController@edit');
    Route::post('wordupdate', 'WordController@update');
    Route::get('worddelete/{id}', 'WordController@destroy');
    Route::post('massdelete', 'WordController@massdelete');
    Route::get('suomitrain', 'WordController@suomitrain');
    Route::get('russiantrain', 'WordController@russiantrain');
    Route::get('randomsuomi', 'WordController@randomsuomi');
    Route::get('randomrussian', 'WordController@randomrussian');


    //LessonsController routes
    Route::get('addlessons', 'LessonController@index');
    Route::post('insertlessons', 'LessonController@store');
    Route::get('lessons/{id}', 'LessonController@show');
    Route::get('lessons/grammar/{id}', 'LessonController@grammar');
    Route::get('lessons', 'LessonController@all_lessons');
    Route::get('deletelessons/{id}', 'LessonController@destroy');


    //VocabularyController routes
    Route::get('vocabulary', 'VocabularyController@index');


    //Test routes
    Route::post('wordupdateajax', 'WordController@updateajax');
    Route::get('/test', 'WordController@test');

    Route::get('/jstest', function (){
        return view('jstestview');
    });


});
