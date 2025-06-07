<?php

echo "<h2>Array Functions Practice</h2>";

// Base Array for all examples

$fruits = ["apple", "mango", "banana"];
echo "Our Base Array";
print_r($fruits);

echo "<br>";
// array_push to add elements to the end of an array

array_push($fruits, "cherry", "pineapple");

print_r($fruits);

echo "<br>";

// array_unshift add element to the beginning of an array (prepend)
array_unshift($fruits, "muskmelon");
print_r($fruits);

echo "<br>";

// array_pop - remove the last element

$lastFruit = array_pop($fruits);
echo $lastFruit;
echo "<br>";
print_r($fruits);

echo "<br>";

$firstFruit = array_shift($fruits);
echo $firstFruit;
echo "<br>";
print_r($fruits);



