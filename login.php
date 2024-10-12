<?php 

session_start();

require "./person/person.php";


if (isset($_POST["submit"]))  {
    $person = Person::get_Person($_POST["uname"], $_POST["passwrd"]);
    if (!empty($person)) {
        $_SESSION['person'] = serialize($person);
        header("Location: dashboard.php");
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
            <input type="submit" name="submit" value="login">
            <button><a href="./signup.php">sign up</a></button>
        </form>
    </div>
</body>
</html>