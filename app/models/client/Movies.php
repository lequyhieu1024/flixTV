<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class Movies extends BaseModel
{
    protected $table = 'movies';
    protected $table2 = 'genres';
    protected $table3 = 'link_movies';
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
    public function updateViews($id)
    {
        $sql = "UPDATE $this->table SET views = views + 1 WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getMoviesByGenres($id)
    {
        $sql = "SELECT *,$this->table.id as movie_id FROM $this->table
        JOIN $this->table2 ON $this->table.genre_id = $this->table2.id 
        WHERE genre_id = ? AND $this->table.flag = 0";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function newestMovieLimit6()
    {
        $sql = "SELECT $this->table.*, genres.id as genre_id, name 
            FROM $this->table
            JOIN $this->table2 ON $this->table.genre_id = $this->table2.id
            WHERE $this->table.flag = 0 AND $this->table2.flag = 0
            ORDER BY id DESC
            LIMIT 6";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function newestMovieLimit4()
    {
        $sql = "SELECT $this->table.*, genres.id as genre_id, name 
            FROM $this->table
            JOIN $this->table2 ON $this->table.genre_id = $this->table2.id
            WHERE $this->table.flag = 0 AND $this->table2.flag = 0
            ORDER BY id DESC
            LIMIT 4";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function get30MoviesNewest()
    {
        $sql = "SELECT $this->table.*,genres.id as genre_id,name FROM $this->table
        JOIN $this->table2 ON $this->table.genre_id = $this->table2.id WHERE $this->table.flag=0 AND $this->table2.flag=0
        ORDER BY id DESC
        LIMIT 30 ";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function get30MoviesViewest()
    {
        $sql = "SELECT $this->table.*,genres.id as genre_id,name FROM $this->table
        JOIN $this->table2 ON $this->table.genre_id = $this->table2.id WHERE $this->table.flag=0 AND $this->table2.flag=0
        ORDER BY views DESC
        LIMIT 30 ";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function countEpisodes()
    {
        $sql = "SELECT $this->table.id, COUNT(link_id) AS num_episodes 
                FROM $this->table 
                LEFT JOIN $this->table3 ON $this->table.id = $this->table3.movie_id 
                GROUP BY $this->table.id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function getAllLinkMovies($id)
    {
        $sql = "SELECT * FROM $this->table3 WHERE movie_id = ? ORDER BY episode ASC";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function search($kw)
    {
        $similarTitles = [];
        $titlesInDatabase = $this->getAllMovies(); // Hàm này để lấy tất cả các tiêu đề từ cơ sở dữ liệu

        foreach ($titlesInDatabase as $title) {
            $titleStr = $title->title;
            similar_text($kw, $titleStr, $percent); // Tính toán độ tương đồng giữa chuỗi đầu vào và từng tiêu đề trong cơ sở dữ liệu
            if ($percent > 20) { // Nếu độ tương đồng lớn hơn 80%, coi đó là một kết quả tương đồng và thêm vào mảng
                $similarTitles[] = $titleStr;
            }
        }

        // Thực hiện truy vấn với các tiêu đề tương tự tìm được
        $sql = "SELECT $this->table.*, genres.id as genre_id, name 
        FROM $this->table
        JOIN $this->table2 ON $this->table.genre_id = $this->table2.id 
        WHERE $this->table.flag = 0 
            AND $this->table2.flag = 0 
            AND title IN ('" . implode("','", $similarTitles) . "')
            ORDER BY 
                CASE 
                    WHEN title LIKE '$kw%' THEN 1
                    WHEN title LIKE '%$kw%' THEN 2
                    ELSE 3
                END";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
}
