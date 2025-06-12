<?php
header('Content-Type: application/json');
$host = "localhost";
$dbname = "supercrud";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    http_response_code(500);

    echo json_encode([
        "error" => "Database Connection Failed"
    ]);
    exit();
}