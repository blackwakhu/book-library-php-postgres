<?php 

session_start();

require "../models/person.php";
require "../models/book.php";
require "../public/template/links.php";


if (isset($_POST["login"]))  {
    $person = Person::get_Person($_POST["uname"], $_POST["passwrd"]);
    if (!empty($person)) {
        $_SESSION['person'] = serialize($person);
        header("Location: ../dashboard.php");
        exit();
    }
}

if (isset($_POST["signup"]))  {
    header("Location: signup.php");
    exit();
}

$title = "genre";
$css = [
    "../public/style/style.css"
];

$js = [
    "../public/function/function.js"
]


?>


<!DOCTYPE html>
<html lang="en">

<?= headerTemplate($title, $css) ?>

<body>
    <h1>Genre</h1>

    <h1>All genres</h1>
    
    <?php
        $genres = Genre::get_all_genre();
        if (empty($genres))  {
            echo "No genre available. Please add more";
        } else  {
            foreach ($genres as $genre)  {
                echo $genre->getTitle();
            }
        }
    ?>
    
    <?= getFunction($js) ?>
    
</body>
</html>