<?php 

// session_start();

// require_once "../models/person.php";
// require "../models/book.php";
// require "../models/book_genre.php";
require "../public/template/links.php";

// if ($_SESSION['person'] == null)  {
//     echo "hello";
//     header("Location: ../index.php");
//     exit();
// }

// try {
//     $person = unserialize($_SESSION['person']);
// } catch (Exception $e) {
//     // Handle unserialization errors gracefully
//     echo "Error: Unable to unserialize session data.";
//     exit();
// }

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