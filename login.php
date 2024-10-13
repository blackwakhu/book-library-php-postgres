<?php 

session_start();

require "./person/person.php";
require "./public/template/head.php";


if (isset($_POST["login"]))  {
    $person = Person::get_Person($_POST["uname"], $_POST["passwrd"]);
    if (!empty($person)) {
        $_SESSION['person'] = serialize($person);
        header("Location: dashboard.php");
        exit();
    }
}

if (isset($_POST["signup"]))  {
    header("Location: signup.php");
    exit();
}

$title = "Login";
$css = [
    "./public/style/logins.css",
    "./public/style/style.css"
];


?>

<!DOCTYPE html>
<html lang="en">

<?= headerTemplate($title, $css) ?>

<body>
    
    <div class="formlogin" id="formlogin">
        <h1>Login</h1>
        
        <form action="./login.php" method="post">

            <label class="formloginlabel" for="uname">Username</label><br>
            <input type="text" name="uname" id="" class="formlogininp">

            <label class="formloginlabel" for="passwrd">Password</label><br>
            <input type="password" name="passwrd" id="" class="formlogininp">

            <input type="submit" name="signup" value="Sign up">
            <input type="submit" name="login" value="Login">

        </form>
    </div>
</body>
</html>