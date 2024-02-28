<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\InterfaceController;
use App\Models\Admin\Genres;
use App\Models\Admin\Movies;

class MoviesController extends BaseController implements InterfaceController
{
    protected $movie;
    protected $genre;
    public function __construct()
    {
        $this->movie = new Movies;
        $this->genre = new Genres;
    }
    public function index()
    {
        $movies = $this->movie->list();
        // print_r($movies);
        return $this->render('admin.movies.index', compact('movies'));
    }
    public function create()
    {
        $genres = $this->genre->list();
        return $this->render('admin.movies.add', compact('genres'));
    }
    public function store()
    {
        $data = [
            'link_trailer' => $_POST['link_trailer'],
            'link_movie' => $_POST['link_movie'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'release_date' => $_POST['release_date'],
            'duration_minutes' => $_POST['duration_minutes'],
            'author' => $_POST['author'],
            'genre_id' => $_POST['genre_id'],
            'nation' => $_POST['nation'],
            'rating' => $_POST['rating'],
        ];
        $errors = [];
        if ($data['link_trailer'] == "") {
            $errors[] = 'Không được bỏ trống link trailer';
        }
        if ($data['link_movie'] == "") {
            $errors[] = 'Không được bỏ trống link phim';
        }
        if ($data['title'] == "") {
            $errors[] = 'Không được bỏ trống tên phim';
        }
        if ($data['description'] == "") {
            $errors[] = 'Không được bỏ trống mô tả';
        }
        if ($data['release_date'] == "") {
            $errors[] = 'Không được bỏ trống ngày phát hành';
        }
        if ($data['author'] == "") {
            $errors[] = 'Không được bỏ trống tác giả';
        }
        if ($data['genre_id'] == "") {
            $errors[] = 'Phải chọn ít nhất 1 thể loại phim';
        }
        if ($data['nation'] == "") {
            $errors[] = 'Phải chọn ít nhất 1 quốc gia phát hành';
        }
        if (empty($_FILES['thumbnail_movie']['name'])) {
            $errors[] = 'Không được bỏ trống ảnh nền phim';
        } else {
            $upload_directory = "public/images/thumbnail/";
            $thumbnail_movie_name = $_FILES['thumbnail_movie']['name'];
            $thumbnail_movie_temp = $_FILES['thumbnail_movie']['tmp_name'];

            if (move_uploaded_file($thumbnail_movie_temp, $upload_directory . $thumbnail_movie_name)) {
                $data['thumbnail_movie'] = $thumbnail_movie_name;
            } else {
                $errors[] = "Có lỗi xảy ra khi tải lên ảnh nền phim.";
            }
        }

        if (empty($_FILES['thumbnail_trailer']['name'])) {
            $errors[] = 'Không được bỏ trống ảnh nền trailer';
        } else {
            $upload_directory = "public/images/thumbnail/";
            $thumbnail_trailer_name = $_FILES['thumbnail_trailer']['name'];
            $thumbnail_trailer_temp = $_FILES['thumbnail_trailer']['tmp_name'];

            if (move_uploaded_file($thumbnail_trailer_temp, $upload_directory . $thumbnail_trailer_name)) {
                $data['thumbnail_trailer'] = $thumbnail_trailer_name;
            } else {
                $errors[] = "Có lỗi xảy ra khi tải lên ảnh nền trailer.";
            }
        }
        if (count($errors) > 0) {
            redirect('errors', $errors, 'movies/add');
        } else {
            $res = $this->movie->add($data);
            $res ? redirect('success', 'Thêm thành công', 'movies/add') : redirect('errors', 'Có lỗi sảy ra', 'movies/add');
        }
    }
    public function edit($id)
    {
        $movie = $this->movie->detail($id);
        $genres = $this->genre->list();
        // print_r($movie);
        return $this->render("admin.movies.edit", compact('movie', 'genres'));
    }
    public function update($id)
    {
        $data = [
            'link_trailer' => $_POST['link_trailer'],
            'link_movie' => $_POST['link_movie'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'release_date' => $_POST['release_date'],
            'duration_minutes' => $_POST['duration_minutes'],
            'author' => $_POST['author'],
            'genre_id' => $_POST['genre_id'],
            'nation' => $_POST['nation'],
            'rating' => $_POST['rating'],
        ];
        $errors = [];
        if ($data['link_trailer'] == "") {
            $errors[] = 'Không được bỏ trống link trailer';
        }
        if ($data['link_movie'] == "") {
            $errors[] = 'Không được bỏ trống link phim';
        }
        if ($data['title'] == "") {
            $errors[] = 'Không được bỏ trống tên phim';
        }
        if ($data['description'] == "") {
            $errors[] = 'Không được bỏ trống mô tả';
        }
        if ($data['release_date'] == "") {
            $errors[] = 'Không được bỏ trống ngày phát hành';
        }
        if ($data['author'] == "") {
            $errors[] = 'Không được bỏ trống tác giả';
        }
        if ($data['genre_id'] == "") {
            $errors[] = 'Phải chọn ít nhất 1 thể loại phim';
        }
        if ($data['nation'] == "") {
            $errors[] = 'Phải chọn ít nhất 1 quốc gia phát hành';
        }
        if (count($errors) > 0) {
            redirect('errors', $errors, 'movies/edit/' . $id);
        } else {
            $res = $this->movie->edit($id, $data);
            $res ? redirect('success', 'Cập nhật thành công', 'movies/') : redirect('errors', 'Có lỗi sảy ra', 'movies/edit/' . $id);
        }
    }
    public function destroy($id)
    {
        $res = $this->movie->delete($id);
        $res ? header('location: ' . ADMIN_URL . 'movies/') : "";
    }
    public function updateFlag($id, $flag)
    {
        $res = $this->movie->flag($id, $flag);
        $res ? header('location: ' . ADMIN_URL . 'movies/') : "";
    }
}
