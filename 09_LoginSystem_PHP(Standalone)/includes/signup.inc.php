<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_control.inc.php";

        /*ERROR HANDLERS  */
        $errors = [];

        if (isInputEmpty($username, $password, $email)) {
            $errors["emptyInput"] = "Fill in All Fields";
        }

        if (isInValidEmail($email)) {
            $errors["invalidEmail"] = "Invalid Email Used";
        }
        // check whether username is already taken

        if (isUsernameTaken($pdo, $username)) {
            $errors["usernameTaken"] = "Username Already Taken";
        }

        // check whether email is registered or not

        if (isEmailRegistered($pdo, $email)) {
            $errors["emailUsed"] = "Email is Already Registered";
        }

        // check whether array is errors array is empty 

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION['errorsSignup'] = $errors;

            // return data to user in case of an error, so he doesn't have to retype 
            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION['signupData'] = $signupData;

            header("Location: ../login.php");
            die();
        }

        createUser($pdo, $username, $password, $email);
        header("Location: ../login.php?signup=success");

        $pdo = null;
        $stmt = null;
        die();



    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../login.php");
    die();
}