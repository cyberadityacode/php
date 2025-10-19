<?php // phpcs:ignoreFile

function fullName($first_name, $last_name="") {
    return $first_name . " " . $last_name;
}

$name = fullname("aditya", "dubey");

echo $name;

echo "<br />";

echo fullName("aditya"); //default value for last name is empty string

