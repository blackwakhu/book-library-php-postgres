<?php 

require "../public/template/links.php";


$title = "Login";
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
    

    <?= getFunction($js) ?>
    
</body>
</html>