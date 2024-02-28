<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use App\Models\InterfaceModel;

class Genres extends BaseModel implements InterfaceModel
{
    protected $table = 'genres';
    public function list()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function detail($id)
    {
    }
    public function add($data)
    {
        $name = $data['name'];
        $thumbnail = $data['thumbnail'];

        $options = [$name, $thumbnail];

        $sql = "INSERT INTO `$this->table`(`name`,`thumbnail`) VALUES (?,?)";
        $this->setQuery($sql);
        return $this->execute($options);
    }
    public function edit($id, $data)
    {
    }
    public function delete($id)
    {
    }
    public function flag($id, $flag)
    {
        if ($flag == 0) {
            $sql = "UPDATE $this->table SET flag = 1 WHERE id = ?";
        } else {
            $sql = "UPDATE $this->table SET flag = 0 WHERE id = ?";
        }
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
