@extends('layouts.app')

@section('content')
<style type="text/css">
  .floatleft{
    float: left,
    width='125'
  }
</style>
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
                        
                            
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Movie Name</label>  
                          <div class="col-md-6">
                            <input id="name" name="name" type="text" placeholder="Name of Movie" class="form-control input-md" required=""  onkeydown="if (event.keyCode == 13) { search(); return false; }">
                            <button type="button" onclick="search()">
                              Search
                            </button>
                             
                          </div>
                        </div>

                          <div id="results">

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

<script type="text/javascript">

 function search(){
   $.getJSON( "/search?name="+ $("#name").val(), function( data ) {
      var items = [];
      token = '{{ csrf_field() }}';
      $.each( data.results, function( key, val ) {
        items.push( '<div class="floatleft" id="' + val.id + '" style="float: left; width:125px; height:300px" >\
          <form method="POST" action="/movie">\
          '+token+'\
        <img id="moviePoster' + val.id + '" src="https://image.tmdb.org/t/p/w500'+val.poster_path+'" width="125px" alt="' + val.title + '" >'+ val.title + '\
            <input type="hidden" id="movie_db_id" name="movie_db_id" value="'+val.id+'">\
            <input type="hidden" id="poster_url"  name="poster_url" value="' + val.poster_path + '">\
            <input type="hidden" id="name"        name="name" value="' + val.title + '">\
            </br><button>Add Movie</button>\
            </form></div>' );
      });
     
      $( "#results" ).empty(); 

      $( "<ul/>", {
        "class": "my-new-list",
        html: items.join( "" )
      }).appendTo( "#results" );
    });
 }



</script>
@endsection
