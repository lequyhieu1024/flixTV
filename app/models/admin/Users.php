<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Users extends BaseModel
{
    protected $table = 'users';
    public function list()
    {
        $sql = "SELECT * FROM $this->table WHERE modifier = 0";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
