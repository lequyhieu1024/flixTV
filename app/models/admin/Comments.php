<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Comments extends BaseModel
{
    protected $table = 'comments';
    protected $table2 = 'movies';
    protected $table3 = 'users';
    public function list()
    {
        $sql = "SELECT *, $this->table.id as comment_id FROM $this->table
        JOIN $this->table3 ON $this->table.user_id = $this->table3.id
        JOIN $this->table2 ON $this->table.movie_id = $this->table2.id";
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
        $sql = "SELECT count(*) as total FROM $this->table";
        $this->setQuery($sql);
        $result = $this->execute();
        return $result->fetchColumn();
    }
}
