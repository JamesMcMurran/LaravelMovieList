<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['result','movie_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');

    }

    public function movie()
    {
        return $this->belongsTo('App\Movie');

    }

}
