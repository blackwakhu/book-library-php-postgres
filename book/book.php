<?php 

session_start();

require "../models/person.php";
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

$css = [
    "../public/style/style.css"
];

$js = [
    "../public/function/function.js"
];


?>


<!DOCTYPE html>
<html lang="en">

<?= headerTemplate("book", $css) ?>

<body>
    <h1>Books</h1>
    <div>
        <h2>Add Books</h2>
        <form action="./book.php" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" id="" required>
            <label for="edition">Edition</label>
            <input type="number" name="edition" id="" required>
            <label for="year">Year of publication</label>
            <input type="number" name="year" id="" min=1000>
            <label for="synopsis">Synopsis</label>
            <textarea name="synopsis" id="" cols="30" rows="10" required></textarea>
        </form>
    </div>
    <div>
        <h2>All Books</h2>
        <?php 
            $books = Book::get_all_book();

            if (empty($books))  {
                echo "There is no book. Please add a book";
            } else  {
                echo "<table>";
                echo "<tr><th>title</th><th>edition</th><th>year</th><th>series</th></tr>";

                foreach ($books as $book)  {
                    echo "<tr>";
                    echo "<td>".$book->getTitle()."</td>";
                    echo "<td>".$book->getEdition()."</td>";
                    echo "<td>".$book->getYear()."</td>";
                    echo "<td>".$book->getSeries()."</td>";
                    echo "</tr>";
                }

                echo "<table>";
            }
        ?>    
    </div>

    <?= getFunction($js) ?>
    
</body>

</html>