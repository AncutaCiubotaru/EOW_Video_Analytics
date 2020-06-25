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

Route::get('/videos', 'VimeoIntervalsController@index');
Route::get('/videos/{id}', 'VimeoIntervalsController@show');
Route::get('/videos_many', 'VimeoIntervalsController@show_many');

Route::post('/play_event', 'VimeoEventsController@store_play_event');
Route::post('/bufferend_event', 'VimeoEventsController@store_bufferend_event');
Route::post('/bufferstart_event', 'VimeoEventsController@store_bufferstart_event');
Route::post('/ended_event', 'VimeoEventsController@store_ended_event');
Route::post('/error_event', 'VimeoEventsController@store_error_event');
Route::post('/function_error', 'VimeoEventsController@store_function_error');
Route::post('/pause_event', 'VimeoEventsController@store_pause_event');
Route::post('/progress_event', 'VimeoEventsController@store_progress_event');
Route::post('/seeked_event', 'VimeoEventsController@store_seeked_event');
Route::post('/timeupdate_event', 'VimeoEventsController@store_timeupdate_event');
Route::post('/volumechange_event', 'VimeoEventsController@store_volumechange_event');

Route::post('/record_intervals', 'VimeoIntervalsController@record_intervals');
