<?php 

require_once "../public/template/links.php";


$css = [
    "../public/style/style.css"
];

$js = [
    "../public/function/function.js",
    "../public/function/books.js"
];


?>


<!DOCTYPE html>
<html lang="en">

<?= headerTemplate("Books", $css) ?>


<body>
    <ul>
        <li><a href="../dashboard.php">Home</a></li>
        <li><a>All Books</a></li>
    </ul>

    <?= getFunction($js) ?>
    
</body>

</html>