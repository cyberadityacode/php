<?php

declare(strict_types=1);

function getUser(PDO $pdo, string $username): ?array
{
    $query = "SELECT * FROM users WHERE username = :username;";
    
    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    } catch (PDOException $e) {
        // Optionally log the exception here
        return null;
    }
}
