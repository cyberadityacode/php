<?php

// CORS headers for local development
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit();
}



require 'dbh.inc.php';
require 'jwt_utils.php';


header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$username = $data['username'];
$password = $data['password'];

if (!$username || !$password) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "Missing Username or Password"
    ]);
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?;");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password_hash'])) {
    $payload = [
        'username' => $user['username'],
        'exp' => time() + 3600 //token expire after 1 hour
    ];

    $token = generate_jwt($payload, $SECRET_KEY);
    echo json_encode([
        "status" => "success",
        "token" => $token
    ]);

} else {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Invalid Credentials"
    ]);
}