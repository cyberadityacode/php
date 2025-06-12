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

require 'jwt_utils.php';
global $SECRET_KEY;

header('Content-Type: application/json');

// Get bearer token from header
// 1️⃣ Get Authorization Header
$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? getallheaders()['Authorization'] ?? '';

// 2️⃣ Check if Bearer token exists

if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Token Not Provided"
    ]);
    exit();
}

$token = $matches[1]; // Extract token from "Bearer <token>"


// 3️⃣ Verify the token using secret key

$decoded = verify_jwt($token, $SECRET_KEY);

if (!$decoded) {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Invalid or Expired Token"
    ]);

    exit();
}

// 4️⃣ If valid token, return user info

echo json_encode([
    "status" => "success",
    "message" => "Token is Valid",
    "user" => $decoded["username"]
]);
