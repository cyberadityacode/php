<?php

$users = [
    [
        "user_id" => 1,
        "name" => "aditya",
        "age" => 31,
        "email" => "adityadubey793@gmail.com"
    ],
    [
        "user_id" => 2,
        "name" => "cyberaditya",
        "age" => 32,
        "email" => "cyberaditya@gmail.com"
    ],
    [
        "user_id" => 3,
        "name" => "Aditya Dubey",
        "age" => 32,
        "email" => "adityadubey793@gmail.com"
    ]

];

foreach ($users as $user) {
    foreach ($user as $index => $value) {
        if ($index == "name") {
            echo "<br> $value";
        }
    }
}

//  function to search a user by email and return their full data.

function findUserByEmail($users, $email)
{
    foreach ($users as $user) {
        if ($user["email"] === $email) {
            return $user;
        }
    }
    return null; //No user found
}


//  Test the function
echo "<h3>Search Results</h3>";
$searchEmail = "adityadubey793@gmail.com";
$result = findUserByEmail($users, $searchEmail);

if ($result) {
    foreach ($result as $key => $value) {
        echo ucfirst($key) . ":" . $value . "<br>";
    }
} else {
    echo "User with email $searchEmail not found";
}