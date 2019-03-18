@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add movie</div>

                @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="flex-center position-ref full-height">

                    <div class="content">
                        @auth
                        <form method="POST" action="/moive">
                            {{csrf_field()}}
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Movie Name</label>  
                          <div class="col-md-5">
                          <input id="name" name="name" type="text" placeholder="Name of Movie" class="form-control input-md" required="">
                          <span class="help-block">The name of the movie</span>  
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="Submit"></label>
                          <div class="col-md-4">
                            <button id="Submit" name="Submit" class="btn btn-primary">Add movie to your list</button>
                          </div>
                        </div>
                        @else
                        <div class="title m-b-md">
                           Please login.
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
