<?php

// data source name (dsn)

$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
$dbusername = "root";
$dbpassword = "";

try {
    // php data object - way to connect to database in a flexible way
    //you can use mysqli for the same
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    // in the pdo object set the attribute
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}

