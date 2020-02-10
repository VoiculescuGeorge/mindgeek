<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class ShowcaseController extends Controller
{
    public function showMovies(){
        $movie_repository = new MovieRepository();
        $movies = $movie_repository->getMovies();

        return view('showcase', [
            'movies' => $movies
        ]);
    }
}
