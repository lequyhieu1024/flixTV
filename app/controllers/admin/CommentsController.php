<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CommentsController extends BaseController
{
    public function index()
    {
        return $this->render('admin.comments.index');
    }
}