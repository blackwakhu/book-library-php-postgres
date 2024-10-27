<?php 

session_start();

require "../models/genre.php";
require "../models/book.php";
require "../public/template/links.php";

if ($_SESSION['person'] == null)  {
    echo "hello";
    header("Location: ../index.php");
    exit();
}

try {
    $person = unserialize($_SESSION['person']);
} catch (Exception $e) {
    // Handle unserialization errors gracefully
    echo "Error: Unable to unserialize session data.";
    exit();
}

$new_status = "";

if (isset($_POST["add_genre"]))  {
    $newGenre = new Genre($_POST["genre_title"]);
    $newGenre->Save();
    $new_status = "Successfully saved";
}

$title = "genre";
$css = [
    "../public/style/style.css"
];

$js = [
    "../public/function/function.js"
];


?>


<!DOCTYPE html>
<html lang="en">

<?= headerTemplate($title, $css) ?>

<body>
    <h1>Genre</h1>

    <h2>Add Genre </h2>
    <div>
        <form action="./genre.php" method="post">
            <label for="genre_title">Genre</label>
            <input type="text" name="genre_title" id="genre_title" required>
            <input type="submit" value="submit" name="add_genre">
        </form>
    </div>

    <?= $new_status ?>

    <h2>All genres</h2>
    
    <?php
        $genres = Genre::get_all_genre();
        if (empty($genres))  {
            echo "No genre available. Please add more";
        } else  {
            echo "<table>";
            foreach ($genres as $genre)  {
                echo "<tr>";
                echo "<td>".$genre->getTitle()."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    
    
    <?= getFunction($js) ?>
    
</body>
</html>
