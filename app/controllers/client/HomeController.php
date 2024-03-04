<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\Contacts;
use App\Models\Client\Genres;
use App\Models\Client\Movies;

class HomeController extends BaseController
{
    protected $movie;
    protected $genre;
    protected $contact;
    public function __construct()
    {
        $this->genre = new Genres;
        $this->movie = new Movies;
        $this->contact = new Contacts;
    }
    public function index()
    {
        $genres = $this->genre->getAllGenres();
        $movies = $this->movie->getAllMovies();
        $count = $this->genre->countMoviesOfGenres();
        // $moviesNewestLimit30 = $this->movie->get30MoviesNewest();
        // $moviesViewestLimit30 = $this->movie->get30MoviesViewest();
        // $episodes = $this->movie->countEpisodes();
        // print_r($episodes);
        return $this->render('client.home.index', compact(
            'movies',
            'genres',
            'count'
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
    public function sendContact()
    {
        $data = [
            'fullname' => $_POST['fullname'],
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'content' => $_POST['content'],
        ];
        $errors = [];
        if ($data['fullname'] == "") {
            $errors['fullname'] = "Không được bỏ trống";
        }
        if ($data['email'] == "") {
            $errors['email'] = "Không được bỏ trống";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Không đúng định dạng email (example@gmail.com)";
        }
        if ($data['subject'] == "") {
            $errors['subject'] = "Không được bỏ trống";
        }
        if ($data['content'] == "") {
            $errors['content'] = "Không được bỏ trống";
        }
        if (count($errors) > 0) {
            redirectClient('errors', $errors, 'contact');
        } else {
            $res = $this->contact->sendContact($data);
            $res  ? redirectClient('success', 'Đã gửi thành công', 'contact') : "";
        }
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
