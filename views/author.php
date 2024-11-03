<?php 

require "../public/template/links.php";

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


    <?= getFunction($js) ?>
    
</body>

</html>