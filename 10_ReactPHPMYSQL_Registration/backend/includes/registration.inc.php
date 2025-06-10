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


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Read raw JSON input and decode it

    $data = json_decode(file_get_contents("php://input"), true);

    // Checking if required fields are set
    if (
        isset($data['username']) &&
        isset($data['password']) &&
        isset($data['email']) &&
        isset($data['dob']) &&
        isset($data['profession'])
    ) {
        // Sanitization and data assignment

        $username = htmlspecialchars($data['username']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $dob = $data['dob'];
        $profession = htmlspecialchars($data['profession']);


        // Now its easy to insert this data into my database

        // for now I am returning a success message as JSON

        echo json_encode([
            "status" => "success",
            "message" => "User Registered Successfully!",
        ]);

        

    } else {
        http_response_code(400);

        echo json_encode([
            "status" => "error",
            "message" => "Missing Required Fields",
        ]);
    }
} else {
    // Not a POST request dear

    header("Location: http://localhost:5173/");
    exit();
}