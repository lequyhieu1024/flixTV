<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\Comments;
use App\Models\Client\Genres;
use App\Models\Client\Movies;

class MovieController extends BaseController
{
    protected $movie;
    protected $genre;
    protected $comment;
    public function __construct()
    {
        $this->movie = new Movies;
        $this->genre = new Genres;
        $this->comment = new Comments;
    }
    public function detail($id, $slug)
    {
        $genres = $this->genre->getAllGenres();
        $episodes = $this->movie->getAllLinkMovies($id);
        $movie = $this->movie->getDetailMovie($id);
        $movies = $this->movie->getMoviesByGenres($movie->genre_id);
        $newMovies = $this->movie->newestMovieLimit4();
        $comments = $this->comment->list2Comments($id);
        // echo (count($comments));
        $this->movie->updateViews($id);
        return $this->render('client.movies.detail', compact('movie', 'genres', 'episodes', 'newMovies', 'movies', 'comments'));
    }
    public function moviesByGenres($id)
    {
        $genres = $this->genre->getAllGenres();
        $newestMovies = $this->movie->newestMovieLimit6();
        $movies = $this->movie->getMoviesByGenres($id);
        // print_r($movies);
        return $this->render('client.movies.movies-by-genres', compact('movies', 'newestMovies', 'genres'));
    }
    public function searching()
    {
        $kw = $_POST['input_search'];
        $errors = [];
        $pattern = '/^[\p{L}0-9\s_-]+$/u';
        if ($kw == "") {
            $errors[] = 'errors null string';
        } else if (!preg_match($pattern, $kw)) {
            $errors[] = "errors special characters";
        }
        if (count($errors) > 0) {
            redirectClient('errors', $errors);
        } else {
            $resultMovies = $this->movie->search($kw);
            $genres = $this->genre->getAllGenres();
            $movies = $this->movie->newestMovieLimit6();
            $newestMovies = $this->movie->newestMovieLimit6();
            return $this->render('client.movies.result-searching', compact('resultMovies', 'newestMovies', 'genres'));
        }
    }
}
