<?php 

function headerTemplate ($title, $cssfiles)  {
    $csslink = "";
    foreach($cssfiles as $cssfile) {
        $csslink = "$csslink<link rel='stylesheet' href='$cssfile'>";
    }
    $head =<<<END
        <head>
            <meta author="Derrick Shibero Wakhu">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$title</title>
            $csslink
        </head>
        END;
    return $head;
}

?>

