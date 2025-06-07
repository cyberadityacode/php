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

echo "<br>";

// array_merge merges two arrays together
$newArray = ["popaya", "tomato"];
$arrayMerged = array_merge($fruits, $newArray);

print_r($arrayMerged);

//  Merging arrays with string keys
echo "<br>";
$arrayTempOne = ["color" => "yellow", "size" => "large"];
$arrayTempTwo = ["color" => "orange", "size" => "extralarge"];

$mergedArrayTemp = array_merge($arrayTempOne, $arrayTempTwo);
echo "<br>";

print_r($mergedArrayTemp);

echo "<br>";
echo "<br>";
// Use + (array union) if you want to preserve keys and not overwrite values:

$arrayNum1 = ["a" => 1];
$arrayNum2 = ["a" => 2];

$mergedArrayNum = $arrayNum1 + $arrayNum2;

print_r($mergedArrayNum);
echo "<br>";
echo "<br>";

// Merges arrays recursively.

/* When two arrays have the same string key, 
both values are kept and grouped into an array. */

$arrayMRTempOne = [
    "color" => "red",
    "details" => [
        "size" => "large"
    ]
];

$arrayMRTempTwo = [
    "color" => "yellow",
    "details" => [
        "shape" => "circle"
    ]
];

// merging array via recursive method will group the array keys together

$mergedArrayMRTemp = array_merge_recursive($arrayMRTempOne, $arrayMRTempTwo);

print_r($mergedArrayMRTemp);

echo "<a href='mergeArrayRecursivePro.php'>Merge Array Recursive Pro </a>";