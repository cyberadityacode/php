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

        $username = htmlspecialchars(trim($data['username']));
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $email = trim($data['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(422);
            echo json_encode([
                "status" => "error",
                "message" => "Invalid email format"
            ]);
            exit();
        }

        $dob = $data['dob'];
        $profession = htmlspecialchars(trim($data['profession']));


        // Now its easy to insert this data into my database

        require_once "dbh.inc.php";
        try {
            $query = "INSERT INTO users(username,password,email, dob,profession ) VALUES(:username, :password, :email, :dob, :profession);";
            $stmt = $pdo->prepare($query);

            $stmt->execute([
                ':username' => $username,
                ':password' => $password,
                ':email' => $email,
                ':dob' => $dob,
                ':profession' => $profession

            ]);
            // for now I am returning a success message as JSON

            echo json_encode([
                "status" => "success",
                "message" => "User Registered Successfully!",
            ]);


        } catch (PDOException $e) {
            http_response_code(500);

            if ($e->getCode() === '23000') {
                echo json_encode([
                    "status" => "error",
                    "message" => "This email is already registered"
                ]);
            } else {
                error_log("DB Error: " . $e->getMessage());
                echo json_encode([
                    "status" => "error",
                    "message" => "Something went wrong. Please try again later."
                ]);
            }


            exit();
        }



    } else {
        http_response_code(400);

        echo json_encode([
            "status" => "error",
            "message" => "Missing Required Fields",
        ]);
    }
} else {
    // Not a POST request dear
    http_response_code(405);
    echo json_encode([
        "status" => "error",
        "message" => "Method Not Allowed"
    ]);

}