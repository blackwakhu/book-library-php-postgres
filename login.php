<?php 

require "./person/person.php";

session_start();

$us = "";

if (isset($_POST["submit"]))  {
    $person = get_Person($_POST['uname'], $_POST['passwrd']);
    if (empty($person))  {
        header("Location: index.php");
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <div>
        <form action="./login.php" method="post">
            <label for="uname">Username</label><br>
            <input type="text" name="uname" id=""><br>
            <label for="passwrd">Password</label><br>
            <input type="password" name="passwrd" id=""><br>
            <input type="submit" value="login">
            <button><a href="./signup.php">sign up</a></button>
        </form>
    </div>
    <?= $us ?>
</body>
</html>