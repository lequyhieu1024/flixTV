<?php

namespace App\Controllers\Api;

use App\Models\Admin\Movies;
use App\Models\Admin\Users;

class AdminApiController
{
    protected $user;
    protected $movie;
    public function __construct()
    {
        $this->user = new Users();
        $this->movie = new Movies();
    }
    public function sortByVerified()
    {
        $users = $this->user->sortByVerifiedEmail();
        header('Content-Type: application/json');
        echo json_encode($users);
        exit();
    }
    public function sortByCreatedDate()
    {
        $users = $this->user->sortByDateCreate();
        header('Content-Type: application/json');
        echo json_encode($users);
        exit();
        // print_r($users);
    }
    public function sortByOnline()
    {
        $users = $this->user->sortByIsActive();
        header('Content-Type: application/json');
        echo json_encode($users);
        exit();
        // print_r($users);
    }
    public function sortByViewMovies()
    {
        $sortByViews = $this->movie->sortViews();
        header('Content-Type: application/json');
        echo json_encode($sortByViews);
        exit();
        // print_r($sortByViews);
    }
}
