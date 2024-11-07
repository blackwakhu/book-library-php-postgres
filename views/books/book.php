<?php 

require_once "../../public/template/links.php";
require_once "../../models/book.php";


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
    

    <?= getFunction($js) ?>
    
</body>
</html>