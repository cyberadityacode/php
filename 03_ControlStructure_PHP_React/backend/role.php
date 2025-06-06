<?php

// Allow requests from any origin (for development only)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// If this is a preflight OPTIONS request, return 200 and exit
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

header("Content-Type:application/json");

$input = json_decode(file_get_contents('php://input'), true);



$code = $input['code'] ?? 0;

$message = match ($code) {
    1 => "Welcome Admin!, You have full access",
    2 => "Welcome Editor!, You can edit content",
    3 => "Welcome Viewer!, You can only view Content",
    default=> "Who are you?",
};

echo json_encode(['message' => $message]);