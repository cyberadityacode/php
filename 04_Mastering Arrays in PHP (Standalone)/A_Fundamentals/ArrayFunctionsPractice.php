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

/* 
- **array_slice** - is used to extract a portion of an array 
without modifying the original array.
*/

echo "<br>";

print_r($fruits);
echo "<br>";
echo "<br>";


$splicedArrayEx = array_splice($fruits, 1, 2, true);

print_r($splicedArrayEx);

print_r($fruits);

echo "<br>";
echo "<br>";

// in_array: is used to check if a value exists in an array.

// in_array(mixed $needle, array $haystack, bool $strict = false): bool

$fruitsSample = ["apple", "banana", "mango", "guava"];

if (in_array("banana", $fruitsSample, true)) {
    echo "<br> Banana Exists in an Array";
} else {
    echo "<br> Element not found";
}

echo "<br>";
echo "<br>";

// - **array_keys** - function returns all the keys from an array.

$data = [
    "name" => "aditya",
    "age" => 31,
    "place" => "ujjain"

];

$dataKeys = array_keys($data);
print_r($dataKeys);


// Get Keys by Value

echo "<br>";
echo "<br>";

$dataKeysValue = ["a" => 10, "b" => 20, "c" => 10];

$keysByValue = array_keys($dataKeysValue, 10);
print_r($keysByValue);

echo "<br>";
echo "<br>";

// Use Strict Comparison

$dataStrict = ["x" => "5", "y" => 5];

$keysStrict = array_keys($dataStrict, 5, true);

print_r($keysStrict); //it will print y as 5 


echo "<br>";
echo "<br>";

/* 
- **array_values** - function returns all the values from an array, 
re-indexed numerically from 0.
*/

$dataValues = [
    "name" => "aditya",
    "age" => 31,
    "city" => "jabalpur"
];


$valuesLog = array_values($dataValues);

print_r($valuesLog);

echo "<br>";
echo "<br>";
/* 
- **array_filter** - function filters elements of an array using a 
callback function, returning only the elements that pass the test.

- array_filter(array $array, ?callable $callback = null, int $mode = 0): array
*/

/* 

$array – The array to filter.

$callback (optional) – A function to determine which elements to keep.

$mode (optional) – Use ARRAY_FILTER_USE_KEY, ARRAY_FILTER_USE_BOTH, or 0 (default).
*/

// Example 1: Filter out false, null, 0, '', etc.
//  By default, array_filter() removes "falsy" values (like false, 0, null, '').

$dataFilter = [0, 1, false, 2, '', 3, null];

$outputFilter = array_filter($dataFilter);

print_r($outputFilter);


echo "<br>";
echo "<br>";
// Example 2: Filter with a Custom Callback

$numbers = [1, 2, 3, 4, 5];


// custom callback to filter even numbers

$customCallbackFilter = array_filter($numbers, function ($n) {
    return $n % 2 == 0;
});
print_r($customCallbackFilter);

//  Example 3: Use Both Keys and Values

$dataFilterKeysValues = ["a" => 10, "b" => 20, "c" => 30];

$outputFilterKeysValues = array_filter($dataFilterKeysValues, function ($value, $key) {
    return $key === "b" || $value > 25;
}, ARRAY_FILTER_USE_BOTH);


print_r($outputFilterKeysValues);


echo "<br>";
echo "<br>";

/* 
- **array_map** -function is used to apply a callback function to each element of one or more arrays and return a new array of the results.

array_map(callable $callback, array $array1, array ...$arrays): array
$callback – A function to apply to each element.
$array1, ...$arrays – One or more arrays to process in parallel.

*/

//  Example 1: Square Each Number

$numbersMap = [1, 2, 3, 4];

$squares = array_map(function ($n) {
    return $n ** 2;
}, $numbersMap);

print_r($squares);


echo "<br>";
echo "<br>";

// Example 2: With Named Function

function capitalize($word)
{
    return strtoupper($word);
}

$words = ['aditya', 'dubey', 'dc'];


$capitalized = array_map('capitalize', $words);

print_r($capitalized);

echo "<br>";
echo "<br>";


// Example 3: Multiple Arrays (Like Zipping)

$firstNames = ["aditya", "DC"];
$lastNames = ["dubey", "aditya dubey"];

$fullNames = array_map(function ($first, $last) {
    return "$first $last";
}, $firstNames, $lastNames);

print_r($fullNames);

echo "<br>";
echo "<br>";
/* 
array_reduce() reduces an array to a single value
 by repeatedly applying a callback function.
*/
//  Example 1: Sum of Numbers

$numbersReduceEx = [1, 2, 3, 4, 5];

$sum = array_reduce($numbersReduceEx, function($carry, $item){
    return $carry + $item;
},0);

echo $sum;



echo "<br>";
echo "<br>";
// Example 2: Find the Longest Word

$words = ["apple", "banana", "kiwi", "pineapple"];

$longest = array_reduce($words, function($carry, $item){
    return strlen($item) > strlen($carry) ? $item: $carry;
}, '');

echo $longest;