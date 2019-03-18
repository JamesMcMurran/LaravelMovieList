<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    public function read(){
    	$movies = Movie::all();
    
    	return view('list',['movies' => $movies] );
	    
	}

	public function create(){
    	return view('create');
	}

	public function home(){
    	return view('home');
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
}
