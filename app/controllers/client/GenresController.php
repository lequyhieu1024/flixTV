<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class GenresController extends BaseController
{
    public function list()
    {
        return $this->render('client.genres.list-genres');
    }
}
