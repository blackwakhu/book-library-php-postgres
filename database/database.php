<?php 
function getConnection ()  {
    $username = "shibero";
    $password = "wakhu";
    $hostname = "localhost";

    return new PDO("pgsql:host=$hostname;dbname=phptest", $username, $password);

}
?>