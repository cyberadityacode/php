<?php // phpcs:ignoreFile

$firstName = "aditya";
$lastName = "dubey";


$newArray = compact("firstName","lastName");

echo "<pre>";
print_r($newArray);