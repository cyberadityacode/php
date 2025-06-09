<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];

    try {

        require_once "dbh.inc.php";

        $query = "INSERT INTO users(username, pwd,email) VALUES(:username, :pwd, :email);";

        // Create a prepared statements

        $stmt = $pdo->prepare($query);

        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, ["cost" => 10]);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../signup.php");
        exit();



    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    header("Location: ../signup.php");
}