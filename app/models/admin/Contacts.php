<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Contacts extends BaseModel
{
    protected $table = 'contacts';
    public function list()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
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
        $sql = "SELECT count(*) as total FROM $this->table WHERE flag = 0";
        $this->setQuery($sql);
        $result = $this->execute();
        return $result->fetchColumn();
    }
}
