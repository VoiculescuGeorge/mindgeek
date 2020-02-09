<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeyArtImages extends Model
{

    protected $table = 'keyArtImages';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
