<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class ShowcaseController extends Controller
{
    public function showMovies(){
        $test = new MovieRepository();
        $movies = $test->getMovies();

        return view('welcome', [
            'movies' => $movies
        ]);
    }
}
