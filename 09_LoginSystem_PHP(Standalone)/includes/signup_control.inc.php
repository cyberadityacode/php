<?php

//prevent errors while writing a code similar to use_strict in JS
declare(strict_types=1);

function isInputEmpty(string $username, string $password, string $email)
{
    if (empty($username) || empty($password) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function isInValidEmail(string $email): bool
{
    if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Check username Availability

function isUsernameTaken($pdo, string $username): bool
{
    if (getUsername($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

// check if email is registered or not

function isEmailRegistered($pdo, $email)
{
    if (getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

// Create a New User
function createUser(object $pdo, string $username, string $password, string $email)
{
    if(setUser( $pdo,  $username,$password,  $email)){
        return true;
    }
    else{
        return false;
    }
}