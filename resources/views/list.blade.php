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
                                    <select onchange="location = this.value;">
                                            <option value="/list">Just one users list</option>
                                        @foreach ($users as $key => $user)
                                            <option value="/list?filter={{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="links">
                                    @if (isset($error))
                                        {{$error}}
                                    @else
                                    @foreach ($movies as $key => $movie)
                                        <div style="float: left;padding-bottom: 10px;text-align:center;font-size: 20px;width: 150px; height: 350px">
                                            <img src="https://image.tmdb.org/t/p/w500{{$movie['poster_url']}}" 
                                            width="125" alt="{{$movie['name']}}" /><br/>
                                            {{$movie['name']}}<br/>
                                            Added by:<br/> <a href="/list?filter={{ $movie['creator_id'] }}">{{ $movie['creator'] }}</a><br/>
                                            Score: {{ $movie['score']}}
                                            <div style="">
                                                <a href="https://butterflywinds.com/movie/{{$movie['id']}}/vote/1">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </a>
                                                 &nbsp;&nbsp;&nbsp;
                                                <a href="https://butterflywinds.com/movie/{{$movie['id']}}/vote/0">
                                                    <i class="fas fa-thumbs-down"></i>
                                                </a>
                                            </div>

                                        </div>
                                    @endforeach
                                    @endif
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
