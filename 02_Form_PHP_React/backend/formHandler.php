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



// var_dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']) ?? '');
    $email = htmlspecialchars(trim($_POST['email']) ?? '');
    $age = htmlspecialchars(trim($_POST['age']) ?? '');
    $favouritepet = htmlspecialchars(trim($_POST['favouritepet']) ?? '');
    $hasError = false;
    // htmlentities() - study later
    // Basic Validation 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email Format";
        $hasError = true;
    }

    if (!is_numeric($age) || $age < 0) {
        echo "Age must be non negative number";
        $hasError = true;
    }

    // final output
    if (!$hasError) {
        echo "<h3>Output:</h3>";
        echo "Name: $username <br>";
        echo "Email: $email <br>";
        echo "Age: $age <br>";
        echo "Favourite Pet: $favouritepet <br>";

    }

} else {
    // if user tries to access the formHandler.php via URL directly. redirect to index page
    header("Location: ../index.php");
}