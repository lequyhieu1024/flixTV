<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use App\Models\InterfaceModel;

class Movies extends BaseModel implements InterfaceModel
{
    protected $table = 'movies';
    protected $table2 = 'genres';
    public function list()
    {
        $sql = "SELECT $this->table.id,title,rating,$this->table2.name,author,$this->table.flag,release_date FROM $this->table
        JOIN $this->table2 ON $this->table.genre_id = $this->table2.id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function detail($id)
    {
        $sql = "SELECT * FROM $this->table
        JOIN $this->table2 ON $this->table.genre_id = $this->table2.id
        WHERE $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function add($data)
    {
        $link_trailer = $data['link_trailer'];
        $link_movie = $data['link_movie'];
        $title = $data['title'];
        $description = $data['description'];
        $release_date = $data['release_date'];
        $duration_minutes = $data['duration_minutes'];
        $author = $data['author'];
        $genre_id = $data['genre_id'];
        $nation = $data['nation'];
        $rating = $data['rating'];
        $thumbnail_movie = $data['thumbnail_movie'];
        $thumbnail_trailer = $data['thumbnail_trailer'];
        $options = [$link_trailer, $link_movie, $title,  $description, $release_date, $duration_minutes, $author, $genre_id, $nation, $rating, $thumbnail_movie, $thumbnail_trailer];

        $sql = "INSERT INTO `$this->table`(`link_trailer`, `link_movie`, `title`, `description`,
         `release_date`, `duration_minutes`, `author`, `genre_id`, `nation`, `rating`, `thumbnail_movie`, `thumbnail_trailer`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute($options);
    }
    public function edit($id, $data)
    {
        $link_trailer = $data['link_trailer'];
        $link_movie = $data['link_movie'];
        $title = $data['title'];
        $description = $data['description'];
        $release_date = $data['release_date'];
        $duration_minutes = $data['duration_minutes'];
        $author = $data['author'];
        $genre_id = $data['genre_id'];
        $nation = $data['nation'];
        $rating = $data['rating'];
        $thumbnail_movie = $data['thumbnail_movie'];

        $options1 = [$link_trailer, $link_movie, $title,  $description, $release_date, $duration_minutes, $author, $genre_id, $nation, $rating, $thumbnail_movie, $id];
        $options2 = [$link_trailer, $link_movie, $title,  $description, $release_date, $duration_minutes, $author, $genre_id, $nation, $rating, $id];
        if ($thumbnail_movie == "") {
            $sql = "UPDATE `$this->table` SET `link_trailer`=?, `link_movie`=?, `title`=?, `description`=?,
            `release_date`=?, `duration_minutes`=?, `author`=?, `genre_id`=?, `nation`=?, `rating`=? WHERE id=?";
            $this->setQuery($sql);
            return $this->execute($options2);
        } else {
            $sql = "UPDATE `$this->table` SET `link_traler`=?, `link_movie`=?, `title`=?, `description`=?,
        `release_date`=?, `duration_minutes`=?, `author`=?, `genre_id`=?, `nation`=?, `rating`=?, `thumbnail_movie`=? WHERE id=?";
            $this->setQuery($sql);
            return $this->execute($options1);
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
}
