<?php 

require "./public/template/head.php";
if (isset($_POST["login"])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST["signup"]))  {
    header("Location: signup.php");
    exit();
}

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

    <header>

        <h1>The Library</h1>

        <div id="formbtn">
            <form action="./index.php" method="post">

                <input type="submit" value="signup" name="signup">
                <input type="submit" value="Login" name="login">

            </form>
        </div>
        
    </header>

</body>
</html>