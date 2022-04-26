<?php

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

Route::get('/episode', 'EpisodeController@show');

Route::get('/emergency', 'EpisodeController@emergency');

Route::get('/patmast', 'PatmastController@show');

Route::get('/diagnose', 'DoctornoteController@show');
Route::post('/diagnose', 'DoctornoteController@post');
Route::post('/nursing', 'NursingController@post');
Route::get('/pathealth2', 'NursingController@pathealth2');

