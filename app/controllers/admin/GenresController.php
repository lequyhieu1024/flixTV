<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\InterfaceController;
use App\Models\Admin\Genres;

class GenresController extends BaseController implements InterfaceController
{
    protected $genre;
    public function __construct()
    {
        $this->genre = new Genres;
    }
    public function index()
    {
        $genres = $this->genre->list();
        return $this->render('admin.genres.index', compact('genres'));
    }
    public function create()
    {
        return $this->render('admin.genres.add');
    }
    public function store()
    {
        $errors = [];
        $data['name'] = $_POST['name'];
        if ($data['name'] == "") {
            $errors[] = "Không được bỏ trống tên thể loại";
        }
        if (empty($_FILES['thumbnail']['name'])) {
            $errors[] = 'Không được bỏ trống ảnh nền thể loại';
        } else {
            $upload_directory = "public/images/thumbnail/";
            $thumbnail_name = $_FILES['thumbnail']['name'];
            $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];

            if (move_uploaded_file($thumbnail_temp, $upload_directory . $thumbnail_name)) {
                $data['thumbnail'] = $thumbnail_name;
            } else {
                $errors[] = "Có lỗi xảy ra khi tải lên ảnh nền thể loại.";
            }
        }

        if (count($errors) > 0) {
            redirect('errors', $errors, 'genres/add');
        } else {
            $res = $this->genre->add($data);
            $res ? redirect('success', 'Thêm thành công', 'genres/add') : redirect('errors', 'Có lỗi sảy ra', 'genres/add');
        }
    }
    public function edit($id)
    {
    }
    public function update($id)
    {
    }
    public function destroy($id)
    {
    }
    public function updateFlag($id, $flag)
    {
        $res = $this->genre->flag($id, $flag);
        $res ? header('location: ' . ADMIN_URL . 'genres/') : "";
    }
}
