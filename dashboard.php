<?php

session_start();

if (empty($_SESSION['person']))  {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit']))  {
    session_destroy();
    header("Location: index.php");
    exit();
}

$person = unserialize($_SESSION['person']);

$greet = $person->hello();



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
    <h1><?= $greet ?></h1>
    <form action="dashboard.php" method="post">
        <button type="submit">sign out</button>
    </form>
</body>
</html>