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
        $count = $this->genre->count();
        $genres = $this->genre->list();
        return $this->render('admin.genres.index', compact('genres', 'count'));
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
            $thumbnail_extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION); // Lấy phần mở rộng của ảnh

            $new_thumbnail_name = pathinfo($thumbnail_name, PATHINFO_FILENAME) . '-' . date('YmdHis') . '.' . $thumbnail_extension;
            $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];

            if (move_uploaded_file($thumbnail_temp, $upload_directory . $new_thumbnail_name)) {
                $data['thumbnail'] = $new_thumbnail_name;
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
        $genre = $this->genre->detail($id);
        return $this->render('admin.genres.edit', compact('genre'));
    }
    public function update($id)
    {
        $genre = $this->genre->detail($id);
        $errors = [];
        $data['name'] = $_POST['name'];
        if ($data['name'] == "") {
            $errors[] = "Không được bỏ trống tên thể loại";
        }
        if (empty($_FILES['thumbnail']['name'])) {
            $data['thumbnail'] = "";
        } else {
            $upload_directory = "public/images/thumbnail/";
            $thumbnail_name = $_FILES['thumbnail']['name'];
            $thumbnail_extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION); // Lấy phần mở rộng của ảnh

            $new_thumbnail_name = pathinfo($thumbnail_name, PATHINFO_FILENAME) . '-' . date('YmdHis') . '.' . $thumbnail_extension;
            $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];

            if (move_uploaded_file($thumbnail_temp, $upload_directory . $new_thumbnail_name)) {
                $data['thumbnail'] = $new_thumbnail_name;
            } else {
                $errors[] = "Có lỗi xảy ra khi tải lên ảnh nền thể loại.";
            }
        }


        if (count($errors) > 0) {
            redirect('errors', $errors, 'genres/edit/' . $id);
        } else {
            $res = $this->genre->edit($id, $data);
            $res ? unlink("public/images/thumbnail/" . $genre->thumbnail) : "";
            $res ? redirect('success', 'Cập nhật thành công', 'genres') : redirect('errors', 'Có lỗi sảy ra', 'genres');
        }
    }
    public function destroy($id)
    {
        $genre = $this->genre->detail($id);
        $res = $this->genre->delete($id);
        $res ? unlink("public/images/thumbnail/" . $genre->thumbnail) : "";
        $res ? redirect('success', 'Xóa thành công', 'genres') : redirect('errors', 'Có lỗi sảy ra', 'genres');
    }
    public function updateFlag($id, $flag)
    {
        $res = $this->genre->flag($id, $flag);
        $res ? header('location: ' . ADMIN_URL . 'genres/') : "";
    }
}
