<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/database/database.php";

class Book  {
    private $book_title;
    private $book_edition;
    private $book_year;
    private $synopsis;
    private $series;

    public function __construct (string $title, int $edition, int $year, string $synopsis, string $series)  {
        $this->book_title = $title;
        $this->book_edition = $edition;
        $this->book_year = $year;
        $this->synopsis = $synopsis;
        $this->series = $series;
    }

    public function getTitle ()  {
        return $this->book_title;
    }

    public function getEdition ()  {
        return $this->book_edition;
    }

    public function getYear ()  {
        return $this->book_year;
    }

    public function getSynopsis ()  {
        return $this->synopsis;
    }

    public function getSeries ()  {
        return $this->series;
    }

    public function getISBN ()  {
        return Book::getISBNfromDB($this->book_title, $this->book_edition);
    }

    public function Save ()  {
        $sql = "insert into books (title, edition, year_published, synopsis, series) 
                values (?, ?, ?, ?, ?)";
        $dataItems = [
            $this->book_title,
            $this->book_edition,
            $this->book_year,
            $this->synopsis,
            $this->series
        ];
        saveToTable($sql, $dataItems);

    }

    public static function getISBNfromDB (string $title, int $edition)  {
        $sql = "select isdn from books where title = ? and edition = ?";

        $data = selectOneDatabase($sql, [$title, $edition]);

        return $data;
    }

    public static function get_all_book ()  {
        $books = [];

        $sql = "select * from books";
        $data = selectAllDatabase($sql, []);

        foreach ($data as $datum)  {
            array_push($books, new Book(
                $datum["title"],
                $datum['edition'],
                $datum['year_published'],
                $datum['synopsis'],
                $datum['series']
            ));
        }
        
        return $books;
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