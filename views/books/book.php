<?php 

require_once "../../public/template/links.php";
require_once "../../models/book.php";

if (empty($_GET["book_isdn"]))  {
    header("Location: ../books.php");
    exit();
}

$book;

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
    
    <h1><?= $_GET["book_isdn"] ?></h1>

    <?= getFunction($js) ?>
    
</body>
</html>