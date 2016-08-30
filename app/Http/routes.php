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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);




Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

//Route::get('/watch', function () {
//    return view('watch');
//});

//Route::get('/watch', function () {
//    return view('watch');
//});

Route::get('/terms', [
    'uses' => 'HomeController@terms',
    'as' => 'terms'
]);

Route::get('/privacy', [
    'uses' => 'HomeController@privacy',
    'as' => 'privacy'
]);


Route::get('/signup', [
    'uses' => 'HomeController@getSignUp',
    'as' => 'signup'
])->middleware('guest');

Route::get('/logout', [
    'uses' => 'AccountController@getLogout',
    'as' => 'logout'
]);
Route::get('/account', [
    'uses' => 'AccountController@getAccount',
    'as' => 'account'
]);

Route::get('/contact', [
    'uses' => 'HomeController@contact',
    'as' => 'contact'
]);

Route::get('/social/v/{id?}/{token?}', [
    'uses' => 'VideoController@getSocialView'
]);


Route::post('/service/contact', [
    'uses' => 'HomeController@postContact',
    'as' => 'post.contact'
]);

Route::post('/service/video/find', [
    'uses' => 'VideoController@postVideoFind',
    'as' => 'post.video.find'
]);
Route::post('/service/video/post/{video?}', [
    'uses' => 'VideoController@postVideo',
    'as' => 'post.video'
]);



Route::get('/account', [
    'uses' => 'AccountController@getAccount',
    'as' => 'account'
]);
Route::get('/profile', [
    'uses' => 'AccountController@getProfile',
    'as' => 'profile'
]);



Route::get('/search/{q?}', 'SearchController@search');
Route::get('/{id?}', 'SearchController@show');


Route::post('service/youtube/video', 'SearchController@video');
Route::post('service/youtube/search', 'SearchController@searchList');
Route::post('service/youtube/search/more', 'SearchController@searchMore');


//Route::get('/signup', 'AccountController@getSignUp');
Route::post('/service/account/signup', [
    'uses' => 'HomeController@postSignUp',
    'as' => 'account.signup'
]);

Route::post('/service/account/signin', [
    'uses' => 'HomeController@postSignIn',
    'as' => 'account.signin'
]);







Route::auth();

Route::get('/home', 'HomeController@index');


