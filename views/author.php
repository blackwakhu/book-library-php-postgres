<?php 

require_once "../public/template/links.php";
require_once "../models/author.php";

if (isset($_POST["submit-btn"]))  {
    $nauthor = new Author(
        $_POST["id"],
        $_POST["fname"],
        $_POST["lname"],
        $_POST["bio"]
    );
    $nauthor->Save();
}


$css = [
    "../public/style/style.css"
];

$js = [
    "../public/function/function.js"
];


?>


<!DOCTYPE html>
<html lang="en">

<?= headerTemplate("Authors", $css) ?>


<body>
    <a href="../dashboard.php">Home</a>

    <form action="./author.php" method="post">
        <label for="id">Author ID</label>
        <input type="text" name="id" id="">
        <label for="fname">fname</label>
        <input type="text" name="fname" id="">
        <label for="lname">lname</label>
        <input type="text" name="lname" id="">
        <label for="bio">Bio</label>
        <textarea name="bio" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="submit" name="submit-btn">
    </form>

    <?php
        $authors = Author::displayAll();

        if (!empty($authors))  {
            echo "
                <table>
                    <thead>
                        <tr>
                            <th>Author id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
            foreach ($authors as $author)  {
                echo "
                        <tr>
                            <td>".$author->getId()."</td>
                            <td>".$author->getName()."</td>
                        </tr>
                ";
            }
            echo "
                    </tbody>
                </table>
            ";
        }
    ?>

    <?= getFunction($js) ?>
    
</body>

</html>