<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videos extends Model
{

    protected $table = 'videos';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
