<?php

session_start();

require "./models/person.php";
require "./public/template/links.php";
require "./public/template/menu.php";

if ($_SESSION['person'] == null)  {
    echo "hello";
    header("Location: index.php");
    exit();
}

try {
    $person = unserialize($_SESSION['person']);
} catch (Exception $e) {
    // Handle unserialization errors gracefully
    echo "Error: Unable to unserialize session data.";
    exit();
}

if (isset($_POST['submit']))  {
    session_destroy();
    header("Location: index.php");
    exit();
} elseif (isset($_POST['genre']))  {
    header("Location: book/genre.php");
    exit();
}

$title = "DashBoard";

$css = [
    "./public/style/style.css",
    "./public/style/menu.css"
];

$js = [
    "./public/function/function.js"
];


?>

<!DOCTYPE html>
<html lang="en">

<?= headerTemplate($title, $css) ?>

<body>

    <?= get_dash_menu($person->getFName()) ?>
    <h1>DashBoard</h1>
    <h1><?= $person->hello() ?></h1>
    <form action="dashboard.php" method="post">
        <button type="submit" name="genre">genre</button>
        <button type="submit" name="submit">sign out</button>
    </form>

    <?= getFunction($js) ?>

</body>
</html>