<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/database/database.php";

class Book  {
    private $book_title;
    private $book_isbn;
    private $book_edition;
    private $book_year;
    private $synopsis;
    private $author_fname;
    private $author_lname;

    public function __construct (string $title, int $edition, int $year, string $synopsis, string $fname, string $lname)  {
        $this->book_title = $title;
        $this->book_edition = $edition;
        $this->book_year = $year;
        $this->synopsis = $synopsis;
        $this->author_fname = $fname;
        $this->author_lname = $lname;
    }
}

class Genre  {
    private string $genre_title;

    public function __construct (string $title)  {
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