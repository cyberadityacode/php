<?php

header("Access-Control-Allow-Origin: *"); // Allow all origins (for testing)
header("Access-Control-Allow-Methods: POST, OPTIONS"); // Allow POST and preflight OPTIONS
header("Access-Control-Allow-Headers: Content-Type"); // Allow JS to send content-type

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
header("Content-Type: application/json");

if (isset($_FILES["file"])) {
    $file = $_FILES['file'];
    $name = $file['name'];
    $tmp = $file['tmp_name'];
    $error = $file['error'];

    $allowed = ['jpg', 'png', 'jpeg'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid file type"]);
        exit;
    }

    if ($error === 0) {
        $newName = uniqid() . "_" . $name;
        $uploadPath = "uploads/" . $newName;

        move_uploaded_file($tmp, $uploadPath);
        echo json_encode(["message" => "File Uploaded Successfully", "filename" => $newName]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "File upload failed"]);
    }

} else {
    http_response_code(400);
    echo json_encode(["message" => "No File Uploaded"]);
}