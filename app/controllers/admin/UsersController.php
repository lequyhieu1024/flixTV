<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Users;

class UsersController extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new Users;
    }
    public function index()
    {
        $count = $this->user->count();
        $users = $this->user->list();
        return $this->render('admin.users.index', compact('users', 'count'));
    }
    public function destroy($id)
    {
        $res = $this->user->delete($id);
        $res ? redirect('success', 'Xóa thành công', 'users') : "";
    }
}
