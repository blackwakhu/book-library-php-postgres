<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/database/database.php";

class Genre  {
    private string $genre_title;

    public function __construct (string $title)  {
        $this->genre_title = $title;
    }

    public function getTitle ()  {
        return $this->genre_title;
    }

    public function Save ()  {
        $sql = "insert into genre (genre_title) values ( ? )";
        $dataItems = [$this->genre_title];

        saveToTable($sql, $dataItems);
    }

    public static function get_all_genre ()  {
        $genres = [];

        $sql = "select * from genre order by genre_title";
        $data = selectAllDatabase($sql, []);

        foreach ($data as $datum)  {
            array_push($genres, new Genre($datum['genre_title']));
        }

        return $genres;
    }

}

?>
