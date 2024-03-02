<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class Genres extends BaseModel
{
    protected $table = 'movies';
    protected $table2 = 'genres';
    public function getAllGenres()
    {
        $sql = "SELECT * FROM $this->table2 WHERE flag = 0";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function countMoviesOfGenres()
    {
        $sql = "SELECT $this->table2.name, COUNT(*) as count
        FROM $this->table
        INNER JOIN $this->table2 ON $this->table.genre_id = $this->table2.id
        WHERE $this->table.flag = 0
        GROUP BY $this->table2.name";

        $this->setQuery($sql);
        $result = $this->loadAllRows();

        // Xây dựng mảng kết quả
        $counts = [];
        foreach ($result as $row) {
            $counts[$row->name] = $row->count;
        }
        return $counts;
    }
}
