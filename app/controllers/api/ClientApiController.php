<?php

namespace App\Controllers\Api;

use App\Models\Client\Comments;
use App\Models\Client\Movies;

class ClientApiController
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
    public function sendCommentStore($id, $slug)
    {
        $data = [
            'movie_id' => $id,
            'user_id' => $_SESSION['id'],
            'comment' => $_POST['comment']
        ];

        $errors = [];

        if (empty($data['user_id'])) {
            $errors['users'] = "Vui lòng đăng nhập để có thể bình luận";
            echo json_encode(['success' => false, 'errors' => $errors]);
            return;
        }

        if (empty($data['comment'])) {
            $errors['comment'] = "Không được bỏ trống bình luận";
            echo json_encode(['success' => false, 'errors' => $errors]);
            return;
        }

        // Gửi bình luận
        $this->comment->sendComment($data);

        // Trả về phản hồi thành công
        echo json_encode(['success' => true, 'message' => 'Đã bình luận']);
    }
}
