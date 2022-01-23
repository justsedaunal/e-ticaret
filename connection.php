<?php

$host = "localhost";

$dbName = "e_ticaret";

$user = "root";

$password = "";

try {
    $db = new PDO("mysql:localhost=$host;dbname=$dbName;user=$user;password=$password");
} catch (PDOException $PDOException) {
    echo $PDOException->getMessage();

}

?>

