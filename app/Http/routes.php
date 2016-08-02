<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/watch', function () {
    return view('watch');
});

Route::get('/watch', function () {
    return view('watch');
});
Route::resource('/service/youtube/video', 'SearchController@video');
Route::resource('/service/youtube/search', 'SearchController@search');
Route::resource('/search/{q}', 'SearchController@show');

