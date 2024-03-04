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
    public function count()
    {
        $sql = "SELECT count(*) as total FROM $this->table WHERE modifier = 0";
        $this->setQuery($sql);
        $result = $this->execute();
        return $result->fetchColumn();
    }
    public function sortByVerifiedEmail()
    {
        $sql = "SELECT * FROM $this->table WHERE verified = 1 and modifier = 0";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function sortByDateCreate()
    {
        $sql = "SELECT * FROM $this->table 
        WHERE modifier = 0
        ORDER BY id DESC";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function sortByIsActive()
    {
        $sql = "SELECT * FROM $this->table 
        WHERE is_active = 1";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function search($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email LIKE %$email%";
        $this->setQuery($sql);
        return $this->loadAllRows([$email]);
    }
}
