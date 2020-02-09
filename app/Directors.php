<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directors extends Model
{

    protected $table = 'directors';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
