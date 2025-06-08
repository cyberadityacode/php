<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // No need to use htmlspecialchars unless you are outputing these variable in page

    $username = htmlspecialchars($_POST["username"]);
    $pwd = htmlspecialchars($_POST["password"]);
    // $email = htmlspecialchars($_POST["email"]);

    try {
        require_once "dbh.inc.php";

        // $query = "INSERT INTO users(username, pwd, email) VALUES($username, $pwd, $email);";
        // unnamed parameter
        // $query = "INSERT INTO users(username, pwd, email) VALUES(?, ?, ?);";

        // Named Parameter with :placeholder
        $query = "DELETE FROM users WHERE username=:username AND pwd=:pwd;";

        // create prepared statement
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        // $stmt->bindParam(":email", $email);

        // $stmt->execute([$username, $pwd, $email]);
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }


} else {
    header("Location: ../index.php");
}