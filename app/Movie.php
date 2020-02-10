<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{

    protected $table = 'movie';
    public $timestamps = true;
    public $incrementing = false;
    protected $casts = [
        'genres' => 'array', // Will convarted to (Array)
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('genres');

    public function cardImages()
    {
        return $this->hasMany('App\CardImages', 'movie_id');
    }

    public function cast()
    {
        return $this->hasMany('App\Cast', 'movie_id');
    }

    public function directors()
    {
        return $this->hasMany('App\Directors', 'movie_id');
    }

    public function galleries()
    {
        return $this->hasMany('App\Galleries', 'movie_id');
    }

    public function keyImages()
    {
        return $this->hasMany('App\KeyArtImages', 'movie_id');
    }

    public function videos()
    {
        return $this->hasMany('App\Videos', 'movie_id');
    }

    public function viewingWindow()
    {
        return $this->hasOne('App\ViewingWindow', 'movie_id');
    }

    public function getRelationshipData($relationship, $field)
    {   
        if($this->$relationship){
            return $this->$relationship->pluck($field)->toArray();
        }
    }

}
