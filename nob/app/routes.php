<?php

/*
|--------------------------------------------------------------------------
| Patterns Vars
|--------------------------------------------------------------------------
*/

// Route::pattern('var','regexp');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',['as'=>'home','uses'=>'Home_MainController@index']);

Route::post('/sendmail',['as'=>'sendmail','uses'=>'Sendmail_MainController@index']);

/*
|--------------------------------------------------------------------------
| Errors Routes
|--------------------------------------------------------------------------
*/

Route::get('/error',['as'=>'nofound','uses'=>'Errors_MainController@index']);
