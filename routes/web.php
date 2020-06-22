<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/videos', 'VideoAnalyticsController@index');
Route::get('/videos/{id}', 'VideoAnalyticsController@show');

Route::post('/playevent', 'VideoAnalyticsController@store_play_event');