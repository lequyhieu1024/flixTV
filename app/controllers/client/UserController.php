<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function profile()
    {
        return $this->render('client.users.profile');
    }
    public function signUp()
    {
        return $this->render('client.users.sign-up');
    }
    public function signIn()
    {
        return $this->render('client.users.sign-in');
    }
    public function forgotPassword()
    {
        return $this->render('client.users.forgot-password');
    }
}
