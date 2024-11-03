<?php 

require "../models/book_genre.php";
require "../public/template/links.php";

$success = "";


$css = [
    "../public/style/style.css"
];

$js = [
    "../public/function/function.js"
];

if (isset($_POST["book_genre_submit"]))  {
    $bookgenre = BookGenre::fromRawInput($_POST["book_isbn"], $_POST["genre"]);
    $bookgenre->Save();
}


?>


<!DOCTYPE html>
<html lang="en">

<?= headerTemplate("book genre", $css) ?>


<body>
    <a href="../dashboard.php">Home</a>

    <form action="./book_genre.php" method="post">
        <label for="genre">Enter the genre</label>
        <input type="text" name="genre" id required/>
        <label for="book">Enter ISBN</label>
        <input type="number" name="book_isbn" id="" required/>
        <input type="submit" value="Submit" name="book_genre_submit"/>
    </form>

    <div>
        <?php
            $books = booksGenre();
            if (!empty($books))  {
                echo "
                    <table>
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Genre</th>
                            </tr>
                        </thead>
                        <tbody>
                ";
                foreach ($books as $book)  {
                    echo "
                        <tr>
                            <td>".$book["title"]."</td>
                            <td>".$book["genre_title"]."</td>
                        </tr>
                    ";
                }
                echo "
                        </tbody>
                    </table>
                ";
            }
        ?>
    </div>

    <?= getFunction($js) ?>
    
</body>

</html>