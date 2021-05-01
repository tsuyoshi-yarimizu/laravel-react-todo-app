<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api'], 'namespace' => 'App\Http\Controllers\Api'], function() {
    Route::get('todo', 'TodoController@index');
    Route::get('todo/{todoId}', 'TodoController@show')
        ->where('todoId', '[0-9]+');
    Route::post('todo', 'TodoController@store');
    Route::put('todo/{todoId}', 'TodoController@update')
        ->where('todoId', '[0-9]+');
});
