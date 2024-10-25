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
    </div>
    <div>
        <h2>All Books</h2>
    </div>
</body>

</html>