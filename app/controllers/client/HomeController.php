<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\Genres;
use App\Models\Client\Movies;

class HomeController extends BaseController
{
    protected $movie;
    protected $genre;
    public function __construct()
    {
        $this->genre = new Genres;
        $this->movie = new Movies;
    }
    public function index()
    {
        $genres = $this->genre->getAllGenres();
        $movies = $this->movie->getAllMovies();
        // $moviesNewestLimit30 = $this->movie->get30MoviesNewest();
        // $moviesViewestLimit30 = $this->movie->get30MoviesViewest();
        // $episodes = $this->movie->countEpisodes();
        // print_r($episodes);
        return $this->render('client.home.index', compact(
            'movies',
            'genres'
            // , 'moviesNewestLimit30', 'moviesViewestLimit30', 'episodes'
        ));
        // echo $_SESSION['auth'];
    }
    public function aboutUs()
    {
        return $this->render('client.home.about-us');
    }
    public function contact()
    {
        return $this->render('client.home.contact');
    }
    public function privacy()
    {
        return $this->render('client.home.privacy');
    }
    public function error()
    {
        return $this->render('client.home.404');
    }
}
