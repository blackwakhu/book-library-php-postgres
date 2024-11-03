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

    <?= getFunction($js) ?>
    
</body>

</html>