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
            $this->genre->getTitle(),
            $this->book->getISBN()
        ];
        saveToTable($sql, $dataItems);
    }
    
    public static function fromRawInput (int $book, string $genre)  {
        return new BookGenre (
            Book::get_book_from_isbn($book),
            new Genre($genre)
        );
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

function booksGenre ()  {
    $sql = "select genre_title, title from book_genre
            inner join books using (book_isdn)
            order by title, genre_title";

    return selectAllDatabase($sql, []);
}

function getGenreFromBook ()  {
    $sql = "select book_isdn from book_genre";

    $books = [];

    $data = selectAllDatabase($sql, []);

    foreach ($data as $datum)  {
        array_push($books, Book::get_book_from_isbn($datum["book_isdn"]));
    }
    return $books;
}



?>
