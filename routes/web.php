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

Route::middleware('auth:login')->get('/', function () {
    return view('welcome');
});


//Create Movie
Route::get('/add', function () {
    return view('createMovie');
});
//read
Route::get('/list', function () {
    return view('listMovie');
});
//Update

//Delete




