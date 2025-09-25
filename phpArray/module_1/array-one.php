<?php // phpcs:ignoreFile

// Indexed Array
$fruits = ["apple", "banana", "mango"];

// Associative Array

$person = ["name" => "aditya", "age" => 32];

// Multidimensional Array
$users = [
    ["name" => "adityadubey", "role" => "deputy collector"],
    ["name" => "aditya", "role" => "DSP"],
];
// Prints human-readable information about the array.
print_r($fruits);

// var_dump:Provides more detailed information (data type, length, and value).
// Useful for debugging complex arrays.

var_dump($fruits);

// Using echo with index access.

echo $fruits[0];
echo "\n";
/* Using foreach loop

Best way to iterate through arrays for display.
*/

foreach ($fruits as $fruit){
    echo "value: $fruit "."\n";
}

/* 
Using implode()

Converts array into a string with a separator.
*/

echo implode(", ",$fruits);


/* 
Using json_encode()

Converts array to JSON string (often for APIs).
*/

echo json_encode($fruits);