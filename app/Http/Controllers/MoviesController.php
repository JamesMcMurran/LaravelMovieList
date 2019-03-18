<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

use Illuminate\Support\Str;


class MoviesController extends Controller
{
	public function home(){
    	return view('home');
	}

    public function read(){
    	$movies = Movie::all();
    	return view('list',['movies' => $movies] ); 
	}

	public function create(){
    	return view('create');
	}


	public function store(){
		request()->validate([
			'name' => ['required', 'min:3']
		]);

		Movie::create([
			'name' => request('name')
		]);

    	return redirect('/list');
	}



	public function api(){
		$user =\Auth::user();
		$token = $user->api_token;

		//just incase they were not given one when they registered. 
		if(empty($token)){
			$token = Str::random(60);
    		$user->api_token = $token;
    		$user->save();
		}

    	return view('api' );
	}
}
