<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Vote;
use App\User;
use \Auth;
use \Tmdb;

use Illuminate\Support\Str;


class MoviesController extends Controller
{
	public function home(){
    	return view('home');
	}

    public function read(){

    	$movies = Movie::all();

    	$users = User::all();

    	//filter results
    	if(isset(request()->filter)){
    		$movies=$movies->where('user_id',(int)request()->filter) ;
    	}

    	$votes = new Vote();

    	foreach ($movies as $key => $movie) {
    		
    		$moviesarray[$key]['score']=$votes->where('movie_id', $movie->id)->sum('result');
    		$moviesarray[$key]['poster_url']=$movie->poster_url;
    		$moviesarray[$key]['creator']=substr($movie->user->name, 0, 10);
    		$moviesarray[$key]['creator_id']=$movie->user_id;
    		$moviesarray[$key]['name']=substr($movie->name, 0, 12);
    		$moviesarray[$key]['id']=$movie->id;
    	}

    	if(!empty($moviesarray)){
	    	usort($moviesarray, function ($a, $b) { 
			    if ($a['score'] == $b['score']) { return 0; }
			    return ($a['score'] > $b['score']) ? -1 : 1;
			});
    	}else{
    		$error= "This user has not added any movies.";
    		return view('list',['users'=>$users,'error'=>$error] );
    	}

    	return view('list',['movies' => $moviesarray,'users'=>$users] ); 
	}

	public function create(){
    	return view('create');
	}


	public function store(){
		request()->validate([
			'name' 			=> ['required', 'min:3'],
			'poster_url'	=> ['required','min:3']
		]);

		Movie::create([
			'name' 			=> request('name'),
			'user_id' 		=> Auth::id(),
			'movie_db_id'	=>request('movie_db_id'),
			'poster_url'	=>request('poster_url'),
			
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

	public function search(){
		
		$token  = new \Tmdb\ApiToken($_ENV['The_Movie_DB_API_Key']);
		$client = new \Tmdb\Client($token);

		$result = $client->getSearchApi()->searchMovies(request('name'));
		return json_encode($result);
 	
	}
}
