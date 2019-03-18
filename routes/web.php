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
    return view('home');
});


Route::get('/add', 'MoviesController@create');

Route::post('/moive', 'MoviesController@store');

Route::get('/home', 'MoviesController@home');

Route::get('/api', 'MoviesController@api');

//read
Route::get('/list', 'MoviesController@read');

//Update

//Delete

Auth::routes();
