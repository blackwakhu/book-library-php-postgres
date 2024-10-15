<?php

session_start();

require "./person/person.php";
require "./public/template/links.php";

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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>DashBoard</h1>
    <h1><?= $person->hello() ?></h1>
    <form action="dashboard.php" method="post">
        <button type="submit" name="genre">genre</button>
        <button type="submit" name="submit">sign out</button>
    </form>
</body>
</html>