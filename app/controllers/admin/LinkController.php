<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\InterfaceController;
use App\Models\Admin\Genres;
use App\Models\Admin\Link;
use App\Models\Admin\Movies;

class LinkController extends BaseController implements InterfaceController
{
    protected $movie;
    protected $genre;
    protected $link;
    public function __construct()
    {

        $this->movie = new Movies;
        $this->link = new Link;
    }
    public function index()
    {
        $count = $this->link->count();
        $links = $this->link->list();
        // $movies = $this->movie->list();
        // print_r($links);
        return $this->render('admin.link-movie.index', compact('links', 'count'));
    }
    public function create()
    {
        $movies = $this->movie->list();
        return $this->render('admin.link-movie.add', compact('movies'));
    }
    public function store()
    {
        $data = [
            'link' => $_POST['link'],
            'episode' => $_POST['episode'],
            'movie_id' => $_POST['movie_id'],
        ];
        $errors = [];
        if ($data['link'] == "") {
            $errors[] = 'Không được bỏ trống link phim';
        }
        if ($data['episode'] == "") {
            $errors[] = 'Không được bỏ trống tập phim';
        } else if ($data['episode'] < 1) {
            $errors[] = 'Số tập phim phải lớn hơn 1';
        }
        if ($data['movie_id'] == "") {
            $errors[] = 'Không được bỏ trống tên phim';
        }

        $link = $this->link->checkEpisode($data['movie_id']);
        foreach ($link as $item) {
            if ($item->episode == $data['episode']) {
                $errors[] = 'Đã có tập phim này';
            }
        }

        if (count($errors) > 0) {
            redirect('errors', $errors, 'links/add');
        } else {
            $res = $this->link->add($data);
            $res ? redirect('success', 'Thêm thành công', 'links/add') : redirect('errors', 'Có lỗi sảy ra', 'links/add');
        }
    }
    public function edit($id)
    {
        $movies = $this->movie->list();
        $link = $this->link->detail($id);
        // print_r($link);
        return $this->render("admin.link-movie.edit", compact('movies', 'link'));
    }
    public function update($id)
    {
        $data = [
            'link' => $_POST['link'],
            'episode' => $_POST['episode'],
            'movie_id' => $_POST['movie_id'],
        ];
        $errors = [];
        if ($data['link'] == "") {
            $errors[] = 'Không được bỏ trống link phim';
        }
        // if ($data['episode'] == "") {
        //     $errors[] = 'Không được bỏ trống tập phim';
        // } else if ($data['episode'] < 2) {
        //     $errors[] = 'Số tập phim phải lớn hơn 2';
        // }
        if ($data['movie_id'] == "") {
            $errors[] = 'Không được bỏ trống tên phim';
        }
        // $link = $this->link->checkEpisode($data['movie_id']);
        // foreach ($link as $item) {
        //     if ($item->episode == $data['episode']) {
        //         $errors[] = 'Đã có tập phim này';
        //     }
        // }
        if (count($errors) > 0) {
            redirect('errors', $errors, 'links/edit/' . $id);
        } else {
            $res = $this->link->edit($id, $data);
            $res ? redirect('success', 'Cập nhật thành công', 'links') : redirect('errors', 'Có lỗi sảy ra', 'links/edit/' . $id);
        }
    }
    public function destroy($id)
    {
        $res = $this->link->delete($id);
        $res ? header('location: ' . ADMIN_URL . 'links/') : "";
    }
}
