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

    public static function fromBook (int $book)  {
        $sql = "select genre from book_genre where book = ?";
        $data = "";
    }

}

?>
