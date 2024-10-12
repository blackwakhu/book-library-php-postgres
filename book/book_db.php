<?php 

require $_SERVER['DOCUMENT_ROOT']."/database/database.php";

class Book  {
    private $book_title;
    private $book_isbn;
    private $book_edition;
    private $book_year;
    private $synopsis;
}

class Genre  {
    private $genre_title;

    public function __contruct ($title)  {
        $this->genre_title = $title;
    }

    public function save_genre ()  {
        $conn = getConnection();
        $sql = "insert into genre (title) values ( ? )";
        $statement = $conn->prepare($sql);
        $statement->execute([
            $this->genre_title
        ]);
    }

}

?>