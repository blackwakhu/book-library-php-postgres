<?php 

require_once "../public/template/links.php";
require_once "../models/author.php";

$success = "";


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