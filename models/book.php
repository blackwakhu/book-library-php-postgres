<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/database/database.php";
require_once "../models/genre.php";

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

    public function getGenres ()  {
        $sql = "select genre_title from book_genre where book_isdn = ?";
        $data = selectAllDatabase($sql, [$this->getISBN()]);

        $genres = [];

        foreach ($data as $datum)  {
            array_push($genres, new Genre($datum['genre_title']));
        }

        return $genres;

    }

    public function getAuthors ()  {
        $sql = "select author_id from book_author where book_isdn = ?";
        $data = selectAllDatabase($sql, [$this->getISBN()]);

        $authors = [];

        foreach ($authors as $author)  {
            array_push($authors, Author::getAuthorFromID($data["author_id"]));
        }

        return $authors;
    }

    public static function getISBNfromDB (string $title, int $edition)  {
        $sql = "select book_isdn from books where title = ? and edition = ? limit 1";

        return select_one_element($sql, [$title, $edition])["book_isdn"];
    }

    public static function fetch_book_from_isbn (int $isbn)  {
        $sql = "select * from books where book_isdn = ? limit 1";
        $data = select_one_element($sql, [$isbn]);

        return new Book (
            $data["title"],
            $data['edition'],
            $data['year_published'],
            $data['synopsis'],
            $data['series']
        );
    }

    public static function get_all_book ()  {
        $books = [];

        $sql = "select * from books order by title, edition";
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

?>