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


    require_once 'dbh.inc.php';

    // Read JSON from React
    $input = json_decode(file_get_contents("php://input"), true);

    if (is_array($input)) {
        // I can now use $input["key"] to access values from the request body

        $username = htmlspecialchars(trim($input["username"]));
        $email = trim($input["email"]);
        $password = trim($input["password"]);

        // Basic Validation

        if (!$username || !$email || !$password) {
            http_response_code(422);
            echo json_encode([
                "status" => "error",
                "message" => "All fields are required"
            ]);
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(422);
            echo json_encode([
                "status" => "error",
                "message" => "Invalid Email Format"
            ]);
            exit();
        }
        if (strlen($password) < 6) {
            http_response_code(422);
            echo json_encode(["status" => "error", "message" => "Password too short (min 6 chars)"]);
            exit();
        }

        // check if username or email exists or not
        try {
            $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email=:email OR username= :username;");
            $stmt->execute([
                ':email' => $email,
                ':username' => $username
            ]);

            if ($stmt->fetch()) {
                http_response_code(409); //conflict
                echo json_encode([
                    "status" => "error",
                    "message" => "Email or Username already registered"
                ]);
                exit();
            }

            // Hash the Password

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // insert new user
            $stmt = $pdo->prepare("INSERT INTO users(username,password_hash,email) VALUES(:username, :password, :email);");
            $stmt->execute([
                ':email' => $email,
                ':username' => $username,
                ':password' => $hashedPassword
            ]);

            http_response_code(201);
            echo json_encode([
                'status' => 'success',
                'message' => 'User Registered Successfully'
            ]);

        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Server error", "error" => $e->getMessage()]);
            // Log the error for dev: $e->getMessage()
            exit();
        }

    } else {
        http_response_code(400); //bad request
        echo json_encode([
            "status" => "error",
            "message" => "Invalid JSON Input"
        ]);
    }

} else {
    http_response_code(405); //method not allowed
    echo json_encode([
        "status" => "error",
        "message" => "Request Method not allowed"
    ]);
}