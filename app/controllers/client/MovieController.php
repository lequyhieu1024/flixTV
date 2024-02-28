<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\Movies;

class MovieController extends BaseController
{
    protected $movie;
    public function __construct()
    {
        $this->movie = new Movies;
    }
    public function detail($id, $slug)
    {
        $movie = $this->movie->getDetailMovie($id);
        return $this->render('client.movies.detail', compact('movie'));
    }
    public function moviesByGenres()
    {
        return $this->render('client.movies.movies-by-genres');
    }
}
