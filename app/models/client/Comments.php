<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class Comments extends BaseModel
{
    protected $table = 'comments';
    protected $table2 = 'movies';
    protected $table3 = 'users';
    public function listComments($movie_id)
    {
        $sql = "SELECT *,$this->table.id as comment_id, $this->table.create_at as comment_time FROM $this->table
        JOIN $this->table2 ON $this->table.movie_id = $this->table2.id
        JOIN $this->table3 ON $this->table.user_id = $this->table3.id
        WHERE $this->table.movie_id = ?
        ORDER BY $this->table.create_at DESC";
        $this->setQuery($sql);
        return $this->loadAllRows([$movie_id]);
    }
    public function list2Comments($movie_id)
    {
        $sql = "SELECT *,$this->table.id as comment_id, $this->table.create_at as comment_time FROM $this->table
        JOIN $this->table2 ON $this->table.movie_id = $this->table2.id
        JOIN $this->table3 ON $this->table.user_id = $this->table3.id
        WHERE $this->table.movie_id = ?
        ORDER BY $this->table.create_at DESC LIMIT 2";
        $this->setQuery($sql);
        return $this->loadAllRows([$movie_id]);
    }
    public function sendComment($data)
    {
        $user_id = $data['user_id'];
        $movie_id = $data['movie_id'];
        $comment = $data['comment'];
        $sql = "INSERT INTO $this->table (user_id, movie_id, comment) VALUES (?,?,?)";
        $this->setQuery($sql);
        $option = [$user_id, $movie_id, $comment];
        return $this->execute($option);
    }
}
