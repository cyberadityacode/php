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
print_r(array_intersect($array_a, $array_b));

echo "<pre>";
print_r(array_intersect_key($array_assoc_a,$array_assoc_b)); //compares key presence only not values
