@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @auth
                        <div class="flex-center position-ref full-height">
                            <div class="content">
                                <div class="title m-b-md">
                                    Movies list
                                </div>

                                <div class="links">
                                    @foreach ($movies as $key => $movie)
                                        <div style="float: left;padding-bottom: 10px;text-align:center;font-size: 20px;">
                                            <img src="https://image.tmdb.org/t/p/w500{{$movie->poster_url}}" 
                                            width="125" alt="{{$movie->name}}" /><br/>
                                            {{$movie->name}}<br/>
                                            <div style="">
                                                <i class="fas fa-thumbs-up"></i> &nbsp;&nbsp;&nbsp; <i class="fas fa-thumbs-down"></i>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
