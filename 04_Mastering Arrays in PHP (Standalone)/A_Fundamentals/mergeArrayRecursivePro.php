<?php

echo "array_merge_recursive_distinct() <br>";

/* 
We want to merge two arrays recursively, meaning:

If both arrays contain a value for the same key 
and both values are arrays, 
we should merge them too (go deeper).

If the values are not arrays, 
the value from the second array should overwrite the value from the first array.

*/

// Check if both array contain value of similar key

$arrayOne = [
    "config" => [
        "debug" => true,
        "cache" => false
    ]
];

$arrayTwo = [
    "config" => [
        "cache" => true,
        "log_level" => "info"
    ]
];
// We want out result
/* 
[
    "config" => [
        "debug" => true,
        "cache" => true,
        "log_level" => "info"
    ]
] */

function array_merge_recursive_distinctly(array &$arrayOne, array &$arrayTwo): array
{
    $merged = $arrayOne;

    foreach ($arrayTwo as $key => $value) {
        if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
            $merged[$key] = array_merge_recursive_distinctly($merged[$key], $value);
        } else {
            // overwrite or add the value from arraytwo
            $merged[$key] = $value;
        }
    }
    return $merged;
}

$output = array_merge_recursive_distinctly($arrayOne, $arrayTwo);

echo "<br>";
print_r($output);
