<?php 

function headerTemplate ($title, $css)  {
    $head =<<<END
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$title</title>
            <link rel="stylesheet" href="public/style/logins.css">
        </head>
        END;
    return $head;
}

?>