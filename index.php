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

    <header>

        <h1>The Library</h1>

        <div id="formbtn">
            <form action="index.php" method="post">

                <input type="submit" value="signup" name="signup">
                <input type="submit" value="Login" name="login">

            </form>
        </div>
        
    </header>
    <!-- <button><a href="./login.php">Login</a></button>
    <button><a href="./signup.php">Sign up</a></button> -->
</body>
</html>