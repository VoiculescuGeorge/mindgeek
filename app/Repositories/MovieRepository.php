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
    
    public function setInstance(){
        return $this->model = new Movie();
    }

    public function getInstance(){
        return $this->model;
    }

    public function checkIfMovieExists($id){
        return $this->model->where('id', '=', $id)->exists();
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
