<?php

namespace App\Controllers\Api;

use App\Models\Client\Comments;
use App\Models\Client\Movies;

class ApiController
{
    protected $movie;
    protected $comment;

    public function __construct()
    {
        $this->movie = new Movies;
        $this->comment = new Comments;
    }
    public function getViewestMovies()
    {
        $moviesViewestLimit30 = $this->movie->get30MoviesViewest();
        header('Content-Type: application/json');
        echo json_encode($moviesViewestLimit30);
        exit;
    }
    public function getNewestMovies()
    {
        $get30MoviesNewest = $this->movie->get30MoviesNewest();
        header('Content-Type: application/json');
        echo json_encode($get30MoviesNewest);
        exit;
    }
    public function getAllComments($id)
    {
        $getAllComments = $this->comment->listComments($id);
        header('Content-Type: application/json');
        echo json_encode($getAllComments);
        exit;
    }
}
