<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name','user_id','poster_url','poster_url'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function vote()
    {
        return $this->belongsToMany('App\Vote');
    }
}
