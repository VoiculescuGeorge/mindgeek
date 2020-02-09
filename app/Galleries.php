<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galleries extends Model
{

    protected $table = 'galleries';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
