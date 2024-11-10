<?php

require_once "../models/book.php";
require_once "../public/template/links.php";

$book;

if (!empty($_GET["book_isdn"]) && !(Book::test_book_isdn($_GET["book_isdn"])))  {
    $book = Book::fetch_book_from_isbn($_GET["book_isdn"]);
} else  {
    header("Location: ../books.php");
    exit();
}

$s = "hello world";

$title = "mybook.php";

$css = [
    "../../public/style/style.css",
    "../../public/style/books.css"
];

$js = [
    "../../public/function/function.js",
    "../../public/function/books.js"
]

?>

<!DOCTYPE html>
<html lang="en">

    <?= headerTemplate($title, $css) ?>

    <body>

        <h1><?= $book->getTitle() ?></h1>

        <div>
            <div>
                <div>
                    <form action="./mybook.php" method="post">
                        <input type="submit" value="new Author" name="nauthor">
                    </form>
                </div>
            </div>
        </div>

        <?= $s ?>
        
        <?= getFunction($js) ?>

    </body>
</html>