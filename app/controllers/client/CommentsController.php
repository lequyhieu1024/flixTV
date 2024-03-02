<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\Comments;

class CommentsController extends BaseController
{
    protected $comment;
    public function __construct()
    {
        $this->comment = new Comments;
    }
    public function sendCommentStore($id, $slug)
    {
        $data = [
            'movie_id' => $id,
            'user_id' => $_SESSION['id'],
            'comment' => $_POST['comment']
        ];
        $errors = [];
        if ($data['user_id'] == "") {
            $errors['users'] == "Vui lòng đăng nhập để có thể bình luận";
            redirectClient('errors', $errors, 'sign-in');
            return false;
        }
        if ($data['comment'] == "") {
            $errors['comment'] = "Không được bỏ trống bình luận";
            redirectClient('errors', $errors, 'detail/' . $id . '/' . $slug);
        }
        if (count($errors) > 0) {
            redirectClient('errors', $errors, 'sign-in');
        } else {
            $this->comment->sendComment($data);
            redirectClient('success', 'Đã bình luận', 'detail/' . $id . '/' . $slug);
        }
        // echo $id . $slug;
    }
}
