<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\Genres;
use App\Models\Client\Movies;

class GenresController extends BaseController
{
    protected $genre;
    protected $movie;
    public function __construct()
    {
        $this->genre = new Genres;
        $this->movie = new Movies;
    }
    public function list()
    {
        $movies = $this->movie->newestMovieLimit6();
        $genres = $this->genre->getAllGenres();
        $count = $this->genre->countMoviesOfGenres();
        // print_r($count);
        return $this->render('client.genres.list-genres', compact('genres', 'movies', 'count'));
    }
}
