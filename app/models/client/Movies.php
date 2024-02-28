<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class Movies extends BaseModel
{
    protected $table = 'movies';
    protected $table2 = 'genres';
    public function getAllMovies()
    {
        $sql = "SELECT $this->table.*,genres.id as genre_id,name FROM $this->table
        JOIN $this->table2 ON $this->table.genre_id = $this->table2.id WHERE $this->table.flag=0 AND $this->table2.flag=0";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function getDetailMovie($id)
    {
        $sql = "SELECT $this->table.*,genres.id as genre_id,name FROM $this->table
        JOIN $this->table2 ON $this->table.genre_id = $this->table2.id WHERE $this->table.flag=0 AND $this->table2.flag=0 AND $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
}
