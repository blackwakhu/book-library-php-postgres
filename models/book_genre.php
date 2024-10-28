<?php 

require "./book.php";
require "./genre.php";
require "../database/database.php";

class BookGenre {
    private $book;
    private $genre;

    public function __construct (Book $book, Genre $genre)  {
        $this->book = $book;
        $this->genre = $genre;
    }

    public function Save ()  {
        $sql = "insert into book_genre (genre, book) values (?, ?)";
        $dataItems = [
            $this->book->getISBN(),
            $this->genre->getTitle()
        ];
        saveToTable($sql, $dataItems);
    }

}

?>
