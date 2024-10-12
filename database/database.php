<?php 

require "dbconfig.php";

function getConnection ()  {
    // returns the connection to the database from pdo
    $username = getenv('DB_USERNAME');
    $password = getenv('DB_PASSWORD');
    $hostname = getenv('DB_HOST');
    $database = getenv('DB_NAME');

    $db = new PDO("pgsql:host=$hostname;dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $db;
}

function saveToTable ($sql, $dataItems)  {
    // template for saving data to a database
    $conn = getConnection();
    $statement = $conn->prepare($sql);
    $statement->execute($dataItems);
}

?>