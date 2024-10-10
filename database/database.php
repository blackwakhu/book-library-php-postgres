<?php 
function getConnection ()  {
    $username = "shibero";
    $password = "wakhu";
    $hostname = "localhost";

    $db = new PDO("pgsql:host=$hostname;dbname=phptest", $username, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $db;
}
?>