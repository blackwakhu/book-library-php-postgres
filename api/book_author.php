<?php 

require_once "../models/book.php";

if ($_SERVER["REQUEST_METHOD"] === "POST")  {
    $isdn = $_POST["book_isdn"];
    $author_id = $_POST["author_id"];

    $book = Book::fetch_book_from_isbn($isdn);
    $author = Author::getAuthorFromID($author_id);

    $book->addAuthor($author);

    $book_authors = $book->getAuthors();

    echo json_encode($book_authors);
}

?>