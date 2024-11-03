<?php 

require "../models/book.php";

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
        $sql = "insert into book_genre (genre_title, book_isdn) values (?, ?)";
        $dataItems = [
            $this->book->getISBN(),
            $this->genre->getTitle()
        ];
        saveToTable($sql, $dataItems);
    }

}

function getBookGenre (int $isbn)  {
    // this will return the genre from the book
    $sql = "select genre from book_genre where book= ? ";
    $data = selectAllDatabase($sql, [$isbn]);
    $genres = [];

    foreach ($data as $datum)  {
        array_push($genres, new Genre ($datum["title"]));
    }

    return $genres;
}

function NotGenre  (int $isbn)  {
    // this will return the genres that are not of the same book
    $noneGenre = [];
    $bookGenre = getBookGenre($isbn);
    $genre = Genre::get_all_genre();

    $found = false;

    foreach ($genre as $genr)  {
        foreach ($bookGenre as $bookge)  {
            if ($genr == $bookge)  {
                $found = true;
            }
        }
        if ($found)  {
            $found = false;
        } else  {
            array_push($noneGenre, $genr);
        } 
    }

    return $noneGenre;
}



?>
