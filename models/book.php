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

    public function Save ()  {
        $sql = "insert into books (title, edition, year_published, synopsis, author_fname, author_lname) 
                values (?, ?, ?, ?, ?, ?)";
        $dataItems = [
            $this->book_title,
            $this->book_edition,
            $this->book_year,
            $this->synopsis,
            $this->author_fname,
            $this->author_lname
        ];
        saveToTable($sql, $dataItems);
    }

    public static function get_all_book ()  {

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
        $genres = [];

        $sql = "select * from genre";
        $data = selectAllDatabase($sql, []);

        foreach ($data as $datum)  {
            array_push($genres, new Genre($datum['title']));
        }

        return $genres;
    }



}

?>