<?php // phpcs:ignoreFile

$string_test = "i love aditya, i love aditya dubey";

echo strpos($string_test, 'aditya'); // returns 7 since aditya begins from index 7

echo "<br />";

echo strrpos($string_test, "aditya"); // returns 22 since from last aditya is at 22 index

// strpos and strrpos are case sensitive
// stripos and strripos are case in-sensitive

