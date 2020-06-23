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

Route::post('/play_event', 'VideoAnalyticsController@store_play_event');
Route::post('/bufferend_event', 'VideoAnalyticsController@store_bufferend_event');
Route::post('/bufferstart_event', 'VideoAnalyticsController@store_bufferstart_event');
Route::post('/ended_event', 'VideoAnalyticsController@store_ended_event');
Route::post('/error_event', 'VideoAnalyticsController@store_error_event');
Route::post('/function_error', 'VideoAnalyticsController@store_function_error');
Route::post('/pause_event', 'VideoAnalyticsController@store_pause_event');
Route::post('/progress_event', 'VideoAnalyticsController@store_progress_event');
Route::post('/seeked_event', 'VideoAnalyticsController@store_seeked_event');
Route::post('/timeupdate_event', 'VideoAnalyticsController@store_timeupdate_event');
Route::post('/volumechange_event', 'VideoAnalyticsController@store_volumechange_event');
Route::post('/chapterchange_event', 'VideoAnalyticsController@store_chapterchange_event');
