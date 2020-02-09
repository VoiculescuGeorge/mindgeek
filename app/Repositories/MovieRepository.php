<?php

namespace App\Repositories;

use App\Movie;

class MovieRepository
{

    protected $model;

    public function __construct()
    {
        $this->model = new Movie();
    }

    public function getMovies(){
        return $this->model->with([
            'cardimages',
            'cast',
            'directors',
            'galleries',
            'keyImages',
            'videos',
            'viewingWindow'
        ])->get();
    }

}
