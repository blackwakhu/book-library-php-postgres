<?php 

require "./book.php";
require "./genre.php";
require "../database/database.php";

class BookGenre {
    // this will save the book and the genre
    private $book;
    private $genre;

    public function __construct (Book $book, Genre $genre)  {
        // this is the constructor of the BookGenre class
        $this->book = $book;
        $this->genre = $genre;
    }

    public function Save ()  {
        // this will save the book and genre
        $sql = "insert into book_genre (genre, book) values (?, ?)";
        $dataItems = [
            $this->book->getISBN(),
            $this->genre->getTitle()
        ];
        saveToTable($sql, $dataItems);
    }

    public static function NotGenre ($isbn)  {
        // this will return the genres that are not of the same book
    }

}



?>
