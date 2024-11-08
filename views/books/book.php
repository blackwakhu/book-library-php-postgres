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

$authors = $book->getAuthors();
$genres = $book->getGenres();


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
                <th>Title: </th>
                <td><?= $book-> getTitle() ?></td>
            </tr>
            <tr>
                <th>Edition: </th>
                <td><?= $book->getEdition() ?></td>
            </tr>
            <tr>
                <th>Year Published: </th>
                <td><?= $book->getYear() ?></td>
            </tr>
            <tr>
                <th>Synopsis: </th>
                <td><?= $book->getSynopsis() ?></td>
            </tr>
            <tr>
                <th>Series: </th>
                <td><?= $book->getSeries() ?></td>
            </tr>
            <tr>
                <th>Author: </th>
                <td>
                    <?php 
                    if (empty($authors))  {
                        echo "<p>There are no authors</p>";
                    } else  {
                        foreach ($authors as $author)  {
                            echo $author->getName()."<br/>";
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Genres: </th>
                <td></td>
            </tr>
        </tbody>
    </table>

    <?= getFunction($js) ?>
    
</body>
</html>