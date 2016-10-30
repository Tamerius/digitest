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

Route::get('/create', 'TestController@create');
Route::post('/save', 'TestController@save');
Route::get('/edit/{id}', 'TestController@edit');

Route::get('/home', 'HomeController@index');

Route::get('/tests/{test_id}/invite/{user_id}/{invite}', 'TestController@invite');
Route::get('/tests/answer/{id}', 'TestController@answer');
Route::get('/tests/delete/{id}', 'TestController@delete');

Route::get('/users/{name}', 'UserController@get_data');
Route::get('/answers/{id}', 'TestController@save_answers');

Auth::routes();
//Route::get('/home', 'UserController@show');