<?php 

require_once $_SERVER['DOCUMENT_ROOT']."/database/database.php";


// class Book for performing Book database functions

class Book  {

    // variables
    private $book_title;
    private $book_edition;
    private $book_year;
    private $synopsis;
    private $series;

    // constructors

    public function __construct (string $title, int $edition, int $year, string $synopsis, string $series)  {
        $this->book_title = $title;
        $this->book_edition = $edition;
        $this->book_year = $year;
        $this->synopsis = $synopsis;
        $this->series = $series;
    }


    // getters

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
    

    // public functions

    public function Save ()  {

        // saves all the details to the database

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

        // gets all the book genres

        $sql = "select genre_title from book_genre where book_isdn = ?";
        $data = selectAllDatabase($sql, [$this->getISBN()]);

        $genres = [];

        foreach ($data as $datum)  {
            array_push($genres, new Genre($datum['genre_title']));
        }

        return $genres;

    }

    public function getAuthors ()  {

        // gets all the authors for the books

        $sql = "select author_id from book_author where book_isdn = ?";
        $data = selectAllDatabase($sql, [$this->getISBN()]);

        $authors = [];

        foreach ($data as $datum)  {
            array_push($authors, Author::getAuthorFromID($datum["author_id"]));
        }

        return $authors;
    }

    public function notAuthors ()  {

        // gets all the authors who did not write the boook but are in the database

        $sql = "
            select author.author_id, author.fname, author.lname, author.bio 
            from author where author.author_id not in (
                select book_author.author_id from book_author 
                where book_author.book_isdn = ?
            );
        ";
        $data = selectAllDatabase($sql, [$this->getISBN()]);

        $authors = [];
        
        foreach ($data as $datum)  {
            array_push($authors, new Author(
                $datum["author_id"],
                $datum["fname"],
                $datum["lname"],
                $datum["bio"]
            ));
        }
        return $authors;

    }

    public function nonGenre ()  {

        // gets all genres in the database that are not part of the book

        $sql = "
            select genre.genre_title from genre where genre.genre_title not in (
                select genre.genre_title from book_genre
                where book_genre.book_isdn = ?
            )
        ";

        $data = selectAllDatabase($sql, [$this->getISBN()]);

        $genres = [];

        foreach ($data as $datum)  {
            array_push($genres, new Genre($datum["genre_title"]));
        }

        return $genres;

    }

    public function addAuthor (Author $author)  {
        
        // binds an author to a single book

        $sql = "insert into book_author (book_isdn, author_id)
            values(?, ?);
        ";

        saveToTable($sql, [
            $this->getISBN(),
            $author->getId()
        ]);

    }

    // This are the static functions

    public static function getISBNfromDB (string $title, int $edition)  {

        // gets the book_isdn using the title and edition from the database

        $sql = "select book_isdn from books where title = ? and edition = ? limit 1";

        return select_one_element($sql, [$title, $edition])["book_isdn"];
    }

    public static function fetch_book_from_isbn (int $isbn)  {

        // gets a single book using the isbn

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

    public static function test_book_isdn (int $isbn)  {

        // tests if the book exists

        $sql = "select * from books where book_isdn = ? limit 1";
        $data = select_one_element($sql, [$isbn]);

        return empty($data);
    }

    public static function get_all_book ()  {

        // returns all the books in the database

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


// function manipulating author database
class Author  {

    // variables 

    private $id;
    private $fname;
    private $lname;
    private $bio;

    // constructor

    public function __construct (int $id, string $fname, string $lname, string $bio)  {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->bio = $bio;
    }

    // getter functions

    public function getId ()  {
        return $this->id;
    }

    public function getFname ()  {
        return $this->fname;
    }

    public function getLname ()  {
        return $this->lname;
    }

    public function getBio ()  {
        return $this->bio;
    }

    public function getName ()  {
        return $this->fname." ".$this->lname;
    }


    // functions


    // function for saving an author

    public function Save()  {
        $sql = "insert into author 
            (author_id, fname, lname, bio)
            values (?, ?, ?, ?)
        ";
        $dataItems = [
            $this->id,
            $this->fname,
            $this->lname,
            $this->bio
        ];

        saveToTable($sql, $dataItems);
    }

    
    // static functions


    // function for getting author from author_id

    public static function getAuthorFromID (int $id)  {
        $sql = "select * from author where author_id = ?";
        $author = select_one_element($sql, [$id]);

        return new Author(
            $author["author_id"],
            $author["fname"],
            $author["lname"],
            $author["bio"]
        );
    }

    // function to display all the authors

    public static function displayAll ()  {
        $sql = "select * from author order by fname";
        $data = selectAllDatabase($sql, []);
        $authors = [];
        
        foreach ($data as $datum)  {
            array_push($authors, new Author(
                $datum["author_id"],
                $datum["fname"],
                $datum["lname"],
                $datum["bio"]
            ));
        }
        return $authors;
    }

}

?>