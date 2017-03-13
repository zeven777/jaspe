<?php

/*
|--------------------------------------------------------------------------
| Patterns Vars
|--------------------------------------------------------------------------
*/

Route::pattern('slug','^([a-z0-9]+)(-?[a-z0-9]+)+$');

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

Route::get('/productos/{slug?}',['as'=>'products.list','uses'=>'Productos_MainController@index']);

Route::get('/producto/{slug}',['as'=>'products.detail','uses'=>'Productos_DetailController@index']);

Route::get('/blog',['as'=>'blog.list','uses'=>'Blog_ListController@index']);

Route::get('/blog/{slug}',['as'=>'blog.detail','uses'=>'Blog_DetailController@index']);

Route::get('/nosotros',['as'=>'about.us','uses'=>'Nosotros_MainController@index']);

Route::get('/contacto',['as'=>'contact','uses'=>'Contacto_MainController@index']);

Route::post('/sendmail',['as'=>'sendmail','uses'=>'Sendmail_MainController@index']);

/*
|--------------------------------------------------------------------------
| Errors Routes
|--------------------------------------------------------------------------
*/

Route::get('/error',['as'=>'nofound','uses'=>'Errors_MainController@index']);
