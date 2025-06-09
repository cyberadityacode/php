<?php

//prevent errors while writing a code similar to use_strict in JS
declare(strict_types=1);


// model function to check username availability from DB
function getUsername(object $pdo, string $username): ?string
{
    $query = "SELECT username FROM users WHERE username=:username;";

    // create prepare statement for secure querying.
    $stmt = $pdo->prepare($query);

    // bind data to the query and send that separately
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    // grab first result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['username'] ?? null;
}

// model function to check email is registered on DD

function getEmail(object $pdo, string $email): ?string
{
    $query = "SELECT email FROM users WHERE email=:email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['email'] ?? null;

}


// model function to create new user

function setUser(object $pdo, string $username, string $password, string $email): ?int
{
    $query = 'INSERT INTO users(username, pwd, email) VALUES(:username, :pwd, :email)';
    $stmt = $pdo->prepare($query);

    // prepare for password hashing before binding parameters
    $options = ["cost" => 12];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPassword);
    $stmt->bindParam(":email", $email);

    if ($stmt->execute()) {
        return (int) $pdo->lastInsertId();

    } else {
        return null;

    }

}
