<?php 

require "dbconfig.php";

function getConnection ()  {
    $username = getenv('DB_USERNAME');
    $password = getenv('DB_PASSWORD');
    $hostname = getenv('DB_HOST');
    $database = getenv('DB_NAME');

    $db = new PDO("pgsql:host=$hostname;dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $db;
}
?>