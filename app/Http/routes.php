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
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

//Route::get('/watch', function () {
//    return view('watch');
//});

//Route::get('/watch', function () {
//    return view('watch');
//});

Route::get('/signup', [
    'uses' => 'AccountController@getSignUp',
    'as' => 'signup'
]);

Route::get('/logout', [
    'uses' => 'AccountController@getLogout',
    'as' => 'logout'
]);
Route::get('/account', [
    'uses' => 'AccountController@getAccount',
    'as' => 'account'
]);

Route::get('/search/{q?}', 'SearchController@search');
Route::get('/{id?}', 'SearchController@show');


Route::post('service/youtube/video', 'SearchController@video');
Route::post('service/youtube/search', 'SearchController@searchList');
Route::post('service/youtube/search/more', 'SearchController@searchMore');


//Route::get('/signup', 'AccountController@getSignUp');
Route::post('/service/account/signup', [
    'uses' => 'AccountController@postSignUp',
    'as' => 'account.signup'
]);

Route::post('/service/account/signin', [
    'uses' => 'AccountController@postSignIn',
    'as' => 'account.signin'
]);



