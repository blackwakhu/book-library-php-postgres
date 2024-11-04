<?php 

require_once "../public/template/links.php";


$css = [
    "../public/style/style.css",
    "../public/style/books.css"
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
        <li><a id="book_sel">Books</a></li>
        <li><a id="add_book_sel">Add Book</a></li>
    </ul>

    <div class="books">
        <h1>Books</h1>
    </div>

    <div class="add">
        <h1>Add Books</h1>
    </div>

    <?= getFunction($js) ?>
    
</body>

</html>