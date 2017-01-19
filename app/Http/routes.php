<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::post('/tasks/edit/{task}', 'TaskController@edit');
	Route::post('/task/doing/{task}', 'TaskController@doing');
	Route::post('/task/todo/{task}', 'TaskController@todo');
	Route::post('/task/done/{task}', 'TaskController@done');
    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::auth();

});
