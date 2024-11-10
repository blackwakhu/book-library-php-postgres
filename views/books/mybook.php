<?php

require_once "../../models/book.php";
require_once "../../public/template/links.php";

$title = "mybook.php";

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
    
        <?= getFunction($js) ?>

    </body>
</html>