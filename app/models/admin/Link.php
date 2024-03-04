<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use App\Models\InterfaceModel;

class Link extends BaseModel implements InterfaceModel
{
    protected $table = 'link_movies';
    protected $table2 = 'movies';
    public function list()
    {
        $sql = "SELECT * FROM $this->table
        JOIN $this->table2 ON $this->table2.id = $this->table.movie_id
        ORDER BY $this->table.movie_id DESC, $this->table.link_id DESC";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function checkEpisode($id)
    {
        $sql = "SELECT * FROM $this->table
        WHERE movie_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function add($data)
    {
        $link = $data['link'];
        $episode = $data['episode'];
        $movie_id = $data['movie_id'];

        $options = [$episode, $link, $movie_id];

        $sql = "INSERT INTO `$this->table`(`episode`,`link`,`movie_id`) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute($options);
    }
    public function edit($id, $data)
    {
        $link = $data['link'];
        // $episode = $data['episode'];
        $movie_id = $data['movie_id'];
        $sql = "UPDATE $this->table SET  link = ?,  movie_id = ? WHERE link_id = ?";
        $this->setQuery($sql);

        $options = [$link, $movie_id, $id];
        return $this->execute($options);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE link_id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function detail($id)
    {
        $sql = "SELECT * FROM $this->table
        JOIN $this->table2 ON $this->table2.id = $this->table.movie_id
        WHERE link_id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function getLinkByMovie($id)
    {
        $sql = "SELECT * FROM $this->table WHERE movie_id = ? ORDER BY episode ASC";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function count()
    {
        $sql = "SELECT count(*) as total FROM $this->table";
        $this->setQuery($sql);
        $result = $this->execute();
        return $result->fetchColumn();
    }
}
