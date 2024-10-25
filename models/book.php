<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/database/database.php";

class Book  {
    private $book_title;
    private $book_isbn;
    private $book_edition;
    private $book_year;
    private $synopsis;
}

class Genre  {
    private $genre_title;

    public function __construct ($title)  {
        $this->genre_title = $title;
    }

    public function getTitle ()  {
        return $this->genre_title;
    }

    public function Save ()  {
        $sql = "insert into genre (title) values ( ? )";
        $dataItems = [$this->genre_title];
        saveToTable($sql, $dataItems);
    }

    public static function get_all_genre ()  {
        $conn = getConnection();
        $genres = [];
        $statement = $conn->prepare("select * from genre");
        $statement->execute();
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($data as $datum)  {
            array_push($genres, new Genre($datum['title']));
        }
        return $genres;
    }



}

?>