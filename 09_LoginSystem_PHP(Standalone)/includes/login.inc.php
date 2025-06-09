<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and trim inputs
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_control.inc.php";
        require_once "config_session.inc.php";

        $errors = [];

        // Input validation
        if (isInputEmpty($username, $password)) {
            $errors["emptyInput"] = "Fill in all fields.";
        }

        $user = getUser($pdo, $username);

        if (!$user || isUsernameWrong($user)) {
            $errors["login_incorrect"] = "Incorrect login info.";
        } elseif (isPasswordWrong($password, $user["pwd"])) {
            $errors["login_incorrect"] = "Incorrect login info.";
        }

        // Redirect back with errors if any
        if (!empty($errors)) {
            $_SESSION["errors_login"] = $errors;
            $_SESSION["loginData"] = ["username" => htmlspecialchars($username)];
            header("Location: ../login.php");
            exit();
        }

        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        // Set user session variables
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_username"] = htmlspecialchars($user["username"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../login.php?login=success");
        exit();

    } catch (PDOException $e) {
        error_log("Login DB Error: " . $e->getMessage());
        http_response_code(500);
        echo "Internal Server Error";
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
