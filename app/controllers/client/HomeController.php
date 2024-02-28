<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\Movies;

class HomeController extends BaseController
{
    protected $movie;
    public function __construct()
    {
        $this->movie = new Movies;
    }
    public function index()
    {
        $movies = $this->movie->getAllMovies();
        return $this->render('client.home.index', compact('movies'));
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
