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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/save', 'TestController@save');

Route::get('/create', 'TestController@create');

Route::get('/home', 'HomeController@index');

Auth::routes();
//Route::get('/home', 'UserController@show');