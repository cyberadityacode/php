<?php // phpcs:ignoreFile

// Array intersect -> common b/w two arrays

$array_a = ['red', 'green', 'blue'];
$array_b = ['yellow', 'orange', 'red'];

$array_assoc_a = [
    'a' => 'red',
    'b' => 'green'
];

$array_assoc_b = [
    'a' => 'red',
    'c' => 'blue'
];
echo "<pre>";
print_r(array_intersect($array_a, $array_b));

echo "<pre>";
print_r(array_intersect_key($array_assoc_a,$array_assoc_b)); //compares key presence only not values


// Commmon interest of user

$user_a = ['php', 'js','react'];
$user_b = ['css', 'react', 'php', 'sql'];

echo "Common Interest - ". implode(", ", array_intersect($user_a, $user_b));


/* Strict matching records */

$old_data = [
    "username" => "aditya",
    "role" => "editor",
    "status" => "active"
];

$new_data = [
    "username" => "aditya",
    "role" => "admin",
    "status" => "active"
];


$matched = array_intersect_assoc($old_data,$new_data);

print_r($matched);

/* 
Case-insensitive Comparison (Using array_uintersect)
*/
$array1 = ["PHP", "JavaScript", "Python"];
$array2 = ["php", "C++", "PYTHON"];

print_r(array_uintersect($array1, $array2, "strcasecmp"));
