<?php 

require "./public/template/head.php";

$title = "Index";

$css = [
    "./public/style/style.css",
    "./public/style/index.css"
];

?>

<!DOCTYPE html>
<html lang="en">

<?= headerTemplate($title, $css) ?>

<body>
    <h1>The Library</h1>
    <button><a href="./login.php">Login</a></button>
    <button><a href="./signup.php">Sign up</a></button>
</body>
</html>