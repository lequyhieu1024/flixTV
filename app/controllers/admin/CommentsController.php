<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Comments;

class CommentsController extends BaseController
{
    protected $comment;
    public function __construct()
    {
        $this->comment = new Comments;
    }
    public function index()
    {
        $comments = $this->comment->list();
        return $this->render('admin.comments.index', compact('comments'));
    }
    public function destroy($id)
    {
        $res = $this->comment->delete($id);
        $res ? redirect('success', 'xóa thành công', 'comments') : "";
    }
}
