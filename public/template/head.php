<?php 

function headerTemplate ($title, $cssfiles)  {
    $csslink = "";
    foreach($cssfiles as $cssfile) {
        $csslink = "$csslink<link rel='stylesheet' href='$cssfile'>";
    }
    $favicon = $_SERVER['DOCUMENT_HOST']."/public/favicon/favicon.ico";
    $head =<<<END
        <head>
            <meta author="Derrick Shibero Wakhu">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="$favicon" type="image/x-icon">
            <title>$title</title>
            $csslink
        </head>
        END;
    return $head;
}

?>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">


