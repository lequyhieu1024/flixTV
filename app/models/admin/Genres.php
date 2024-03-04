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
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
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
        $name = $data['name'];
        $thumbnail = $data['thumbnail'];
        if ($data['thumbnail'] != "") {
            $sql = "UPDATE `$this->table` SET `name` = ? ,`thumbnail`=? WHERE id = ?";
            $options = [$name, $thumbnail, $id];
            $this->setQuery($sql);
            return $this->execute($options);
        } else {
            $sql = "UPDATE `$this->table` SET `name` = ? WHERE id = ?";
            $options = [$name, $id];
            $this->setQuery($sql);
            return $this->execute($options);
        }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
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
    public function count()
    {
        $sql = "SELECT count(*) as total FROM $this->table";
        $this->setQuery($sql);
        $result = $this->execute();
        return $result->fetchColumn();
    }
}
