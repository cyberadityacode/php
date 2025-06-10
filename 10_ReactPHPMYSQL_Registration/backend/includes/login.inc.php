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
    require_once "dbh.inc.php";

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['username']) || !isset($data['password'])) {
        echo json_encode([
            "status" => "error",
            "message" => "username or password is missing",
        ]);
        exit();
    }
    $username = trim($data['username']);
    $password = trim($data['password']);

    try {

        //First Check if user Exists or not
        $query = "SELECT * FROM users WHERE username=:username LIMIT 1;";
        $stmt = $pdo->prepare($query);

        $stmt->execute([
            'username' => $username,
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Checking password as stored in hash

            if (password_verify($password, $user['password'])) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login Successfull',
                    'user' => [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'token' => bin2hex(random_bytes(16)) //optional dummy token
                    ],
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Incorrect Password',
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'User not found',
            ]);
        }

    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database Error ' . $e->getMessage(),
        ]);
    }

} else {
    echo json_encode([
        "status" => "error",
        "message" => "REQUEST Method Not Allowed"
    ]);
}