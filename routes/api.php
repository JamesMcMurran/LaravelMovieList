<?php

use Illuminate\Http\Request;
use App\Movie;

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

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('list', function (Request $request) {
    return Movie::all();
});

Route::middleware('auth:api')->get('store', function (Request $request) {
   		try {

			request()->validate([
				'name' => ['required', 'min:3']
			]);

			Movie::create([
				'name' => request('name')
			]);
			
			return "Thank you.";
		}
		catch (exception $e) {
		    return "An error has happend please check your request.";
		}
});