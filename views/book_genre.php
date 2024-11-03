<?php 

session_start();

require "../models/person.php";
// require "../models/book.php";
// require "../models/book_genre.php";
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

    <?= getFunction($js) ?>
    
</body>

</html>