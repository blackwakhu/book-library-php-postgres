<?php 

require_once "../public/template/links.php";


$css = [
    "../public/style/style.css"
];

$js = [
    "../public/function/function.js"
];


?>


<!DOCTYPE html>
<html lang="en">

<?= headerTemplate("Books", $css) ?>


<body>
    <a href="../dashboard.php">Home</a>

    <?= getFunction($js) ?>
    
</body>

</html>