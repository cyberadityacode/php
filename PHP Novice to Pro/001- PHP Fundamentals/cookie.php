<?php // phpcs:ignoreFile

echo "<pre>";
print_r($_COOKIE);

// setcookie(name, value, expire, path, domain, secure, httponly);

setcookie("username", "Aditya", time() + (86400 * 7), "/"); // 7 days expiry


echo "<pre>";
print_r($_COOKIE);

if(isset($_COOKIE['username'])){
    echo "Welcome back, ". $_COOKIE["username"];
}else{
    echo "Hello New User";
}

// Save user’s theme, language, or layout preferences.

// Track User activity i.e, how many time user visited particular site

if(isset($_COOKIE['visit'])){
    $count = $_COOKIE['visit'] + 1;
}else {
    $count = 1;
}

setcookie("visit", $count, time() + (86400 * 7),"/");

echo "You have visited this page $count times";

// When you add items to cart without logging in, cookies can temporarily store them.

/* 
| Concept         | Description                                     | PHP Variable/Function |
| --------------- | ----------------------------------------------- | --------------------- |
| What it is      | Small data stored in browser                    | —                     |
| Created by      | Server using PHP                                | `setcookie()`         |
| Accessed by     | PHP                                             | `$_COOKIE`            |
| Stored at       | Client-side (browser)                           | —                     |
| Real-world uses | Login persistence, preferences, cart, analytics | —                     |

*/