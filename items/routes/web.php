<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', 'HomeController@index');
Route::get('/', 'GroupController@index');

Auth::routes();

Route::get('/home', 'GroupController@index');

Route::group(['prefix' => 'group'], function(){
  Route::get('index', 'GroupController@index');
  Route::get('create', 'GroupController@create');
  Route::post('create', 'GroupController@store');
  Route::get('manage', 'GroupController@manage');
  Route::delete('{group}', 'GroupController@destroy');
  Route::get('{group}', 'GroupController@edit');
  Route::post('{group}', 'GroupController@update');

  Route::get('{group}/items', 'ItemController@index');
  Route::get('{group}/create', 'ItemController@create');
  Route::post('{group}/create', 'ItemController@store');
});

Route::group(['prefix' => 'item'], function(){
  Route::delete('{item}', 'ItemController@destroy');
  Route::get('{item}/edit', 'ItemController@edit');
  Route::post('{item}/update', 'ItemController@update');
});