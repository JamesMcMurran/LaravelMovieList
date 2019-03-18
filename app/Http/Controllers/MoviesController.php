<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function read(){
    	$movies =['Matrix','Matrix Reloded'];
    
	    return view('list',[
	    	'movies'=>$movies
	    ]);
	};
}
