<?php

// Allow requests from your React app
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight (OPTIONS) request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require 'dbh.inc.php';
require 'jwt_utils.php';
global $SECRET_KEY;

header('Content-Type: application/json');

// Get and verify token
$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? getallheaders()['Authorization'] ?? '';
if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Token Not Provided"]);
    exit();
}

$token = $matches[1];
$decoded = verify_jwt($token, $SECRET_KEY);

if (!$decoded) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Invalid or Expired Token"]);
    exit();
}

// Fetch full user information from DB

$username = $decoded['username'];
$stmt = $pdo->prepare("SELECT user_id,username,email,created_at FROM users WHERE username=?;");

$stmt->execute([$username]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode([
        "status" => "error",
        "message" => "user not found"
    ]);
    exit();
}

echo json_encode([
    "status" => "success",
    "user" => $user
]);
