@extends('layouts.app')

@section('content')
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
                                    Your API Key is
                                </div>

                                <div class="links">
                                    {{ Auth::user()->api_token }}<br/><br/>
                                </div>

                                <div class="links">
                                    Send requests to http://butterflywinds.com/api/ENDPOINT?api_token=YOUR_TOKEN<br/>
                                    <br/>
                                    -- Method GET -- <br/><br/>
                                    <a href="http://butterflywinds.com/api?api_token={{ Auth::user()->api_token }}">/api/</a><br/>
                                    This will give you the list of the movies.<br/>
                                    <br/>
                                    <br/>
                                    <a href="http://butterflywinds.com/api/store?name=New Movie&poster_url='/w500/ezIurBz2fdUc68d98Fp9dRf5ihv.jpg'&api_token={{ Auth::user()->api_token }}">/api/store</a><br/>
                                    This will let add a new movie name.<br/>
                                    name="The name of the movie you would like to add."<br/>
                                    poster_url="This is the themoviedb.org image URL. Such as /w500/ezIurBz2fdUc68d98Fp9dRf5ihv.jpg"
                                    <br/>
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