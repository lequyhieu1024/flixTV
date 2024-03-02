<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\InterfaceController;
use App\Models\Admin\Genres;
use App\Models\Admin\Link;
use App\Models\Admin\Movies;

class MoviesController extends BaseController implements InterfaceController
{
    protected $movie;
    protected $genre;
    protected $link;
    public function __construct()
    {
        $this->movie = new Movies;
        $this->genre = new Genres;
        $this->link = new Link;
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
            $thumbnail_movie_extension = pathinfo($thumbnail_movie_name, PATHINFO_EXTENSION); // Lấy phần mở rộng của ảnh

            $new_thumbnail_movie_name = pathinfo($thumbnail_movie_name, PATHINFO_FILENAME) . '-' . date('YmdHis') . '.' . $thumbnail_movie_extension;
            $thumbnail_movie_temp = $_FILES['thumbnail_movie']['tmp_name'];

            if (move_uploaded_file($thumbnail_movie_temp, $upload_directory . $new_thumbnail_movie_name)) {
                $data['thumbnail_movie'] = $new_thumbnail_movie_name;
            } else {
                $errors[] = "Có lỗi xảy ra khi tải lên ảnh nền phim.";
            }
        }

        if (empty($_FILES['thumbnail_trailer']['name'])) {
            $errors[] = 'Không được bỏ trống ảnh nền trailer';
        } else {
            $upload_directory = "public/images/thumbnail/";
            $thumbnail_trailer_name = $_FILES['thumbnail_trailer']['name'];
            $thumbnail_trailer_extension = pathinfo($thumbnail_trailer_name, PATHINFO_EXTENSION); // Lấy phần mở rộng của ảnh

            $new_thumbnail_trailer_name = pathinfo($thumbnail_trailer_name, PATHINFO_FILENAME) . '-' . date('YmdHis') . '.' . $thumbnail_trailer_extension;
            $thumbnail_trailer_temp = $_FILES['thumbnail_trailer']['tmp_name'];

            if (move_uploaded_file($thumbnail_trailer_temp, $upload_directory . $new_thumbnail_trailer_name)) {
                $data['thumbnail_trailer'] = $new_thumbnail_trailer_name;
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
        $movie = $this->movie->detail($id);
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
        if (empty($_FILES['thumbnail_movie']['name'])) {
            $data['thumbnail_movie'] = '';
        } else {
            $upload_directory = "public/images/thumbnail/";
            $thumbnail_movie_name = $_FILES['thumbnail_movie']['name'];
            $thumbnail_movie_extension = pathinfo($thumbnail_movie_name, PATHINFO_EXTENSION); // Lấy phần mở rộng của ảnh

            $new_thumbnail_movie_name = pathinfo($thumbnail_movie_name, PATHINFO_FILENAME) . '-' . date('YmdHis') . '.' . $thumbnail_movie_extension;
            $thumbnail_movie_temp = $_FILES['thumbnail_movie']['tmp_name'];

            if (move_uploaded_file($thumbnail_movie_temp, $upload_directory . $new_thumbnail_movie_name)) {
                $data['thumbnail_movie'] = $new_thumbnail_movie_name;
            } else {
                $errors[] = "Có lỗi xảy ra khi tải lên ảnh nền phim.";
            }
        }


        if (empty($_FILES['thumbnail_trailer']['name'])) {
            $data['thumbnail_trailer'] = '';
        } else {
            $upload_directory = "public/images/thumbnail/";
            $thumbnail_trailer_name = $_FILES['thumbnail_trailer']['name'];
            $thumbnail_trailer_extension = pathinfo($thumbnail_trailer_name, PATHINFO_EXTENSION); // Lấy phần mở rộng của ảnh

            $new_thumbnail_trailer_name = pathinfo($thumbnail_trailer_name, PATHINFO_FILENAME) . '-' . date('YmdHis') . '.' . $thumbnail_trailer_extension;
            $thumbnail_trailer_temp = $_FILES['thumbnail_trailer']['tmp_name'];

            if (move_uploaded_file($thumbnail_trailer_temp, $upload_directory . $new_thumbnail_trailer_name)) {
                $data['thumbnail_trailer'] = $new_thumbnail_trailer_name;
            } else {
                $errors[] = "Có lỗi xảy ra khi tải lên ảnh nền trailer.";
            }
        }

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
            if ($data['thumbnail_movie'] != "" && $data['thumbnail_trailer'] != "" && $res == true) {
                unlink("public/images/thumbnail/" . $movie->thumbnail_movie);
                unlink("public/images/thumbnail/" . $movie->thumbnail_trailer);
            } else if ($data['thumbnail_movie'] == "" && $data['thumbnail_trailer'] != "" && $res == true) {
                unlink("public/images/thumbnail/" . $movie->thumbnail_trailer);
            } else if ($data['thumbnail_movie'] != "" && $data['thumbnail_trailer'] == "" && $res == true) {
                unlink("public/images/thumbnail/" . $movie->thumbnail_movie);
            }
            $res ? redirect('success', 'Cập nhật thành công', 'movies/') : redirect('errors', 'Có lỗi sảy ra', 'movies/edit/' . $id);
        }
    }
    public function destroy($id)
    {
        $movie = $this->movie->detail($id);
        $res = $this->movie->delete($id);
        unlink("public/images/thumbnail/" . $movie->thumbnail_movie);
        unlink("public/images/thumbnail/" . $movie->thumbnail_trailer);
        $res ? header('location: ' . ADMIN_URL . 'movies/') : "";
    }
    public function updateFlag($id, $flag)
    {
        $res = $this->movie->flag($id, $flag);
        $res ? header('location: ' . ADMIN_URL . 'movies/') : "";
    }
    public function detail($id)
    {
        $movie = $this->movie->detail($id);
        $genres = $this->genre->list();
        $links = $this->link->getLinkByMovie($id);
        // print_r($movie);
        return $this->render("admin.movies.detail", compact('movie', 'genres', 'links'));
    }
}
