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
                echo "<tr><th>title</th><th>edition</th><th>year</th><th>synopsis</th><th>author</th></tr>";

                foreach ($books as $book)  {
                    echo "<tr>";
                    echo "<td>".$book->getTitle()."</td>";
                    echo "</tr>";
                }

                echo "<table>";
            }
        ?>    
    </div>

    <?= getFunction($js) ?>
    
</body>

</html>