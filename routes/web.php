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

Route::post('/movie', 'MoviesController@store');

Route::get('/home', 'MoviesController@home');

Route::get('/apikey', 'MoviesController@api');
//read
Route::get('/list', 'MoviesController@read');
//read
Route::get('/search', 'MoviesController@search');

//Update

//Delete

//   /movie/{id}/vote/{1/0}/
Route::get('/movie/{movie}/vote/{vote?}/', function ($movieId, $vote) {
	$uid = Auth::id();

	if($vote>0){
		$vote=1;
	}else{
		$vote=-1;
	}

      	$r = App\Vote::updateOrCreate(
		    [
		    	'movie_id'	=> $movieId,
		    	'user_id' 	=> $uid
		    ],
		    [	'result' 	=> $vote]
		);
	if(empty($r)){
		throw new Exception("Error Processing Request", 1);
	}else{
    	return back();
    }
});

Auth::routes();
