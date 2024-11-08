<?php 

require_once "../../public/template/links.php";
require_once "../../models/book.php";

$book;

if (!empty($_GET["book_isdn"]) && !(Book::test_book_isdn($_GET["book_isdn"])))  {
    $book = Book::fetch_book_from_isbn($_GET["book_isdn"]);
} else  {
    header("Location: ../books.php");
    exit();
}


$title = "Login";
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
    
    <h1>Books</h1>
    <table>
        <tbody>
            <tr>
                <th>Title:</th>
                <td><?= $book-> getTitle() ?></td>
            </tr>
            <tr>
                <th>Edition:</th>
                <td><?= $book->getEdition() ?></td>
            </tr>
        </tbody>
    </table>

    <?= getFunction($js) ?>
    
</body>
</html>