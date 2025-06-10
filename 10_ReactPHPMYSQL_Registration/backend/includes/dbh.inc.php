<?php

$host = "localhost";
$dbname = "registration_db";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

    // mysql:host=your_host;dbname=your_db


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

} catch (PDOException $e) {
    echo "Query Failed..." . $e->getMessage();
}