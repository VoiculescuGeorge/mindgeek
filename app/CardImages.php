<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardImages extends Model
{

    protected $table = 'cardImages';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function movie()
    {
        return $this->belongsTo('Movie', 'movie_id', 'id');
    }

}
