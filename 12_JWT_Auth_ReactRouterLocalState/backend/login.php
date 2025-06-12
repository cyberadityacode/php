<?php

require 'dbh.inc.php';
require 'jwt_utils.php';
global $SECRET_KEY;

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$username = $data['username'];
$password = $data['password'];

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