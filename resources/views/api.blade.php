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
                                    <a href="http://butterflywinds.com/api/list?name=New Movie&api_token={{ Auth::user()->api_token }}">/api/list</a><br/>
                                    This will give you the list of the movies.<br/>
                                    <br/>
                                    <br/>
                                    <a href="http://butterflywinds.com/api/store?name=New Movie&api_token={{ Auth::user()->api_token }}">/api/store</a><br/>
                                    This will let add a new movie name.<br/>
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