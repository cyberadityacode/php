<?php


$pwd = "dcadityadubey1077";

// password_hash($pwd, PASSWORD_DEFAULT);
// password_hash($pwd, PASSWORD_BCRYPT);


// $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);


/* 
The cost parameter controls the computational complexity of the hash.
 Higher values increase security but also increase processing time.
 */


$hashedPwd = password_hash($pwd , PASSWORD_BCRYPT, ['cost' => 12]);

$pwdLogin = "dcadityadubey1077";

if (password_verify($pwdLogin, $hashedPwd)) {
    echo "Verification Successfull!";
} else {
    echo "Verification Failed!";
}

