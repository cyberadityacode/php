<?php

/* 
Flatten a Multi-dimensional Array

Convert a nested array like:

['a' => ['b' => ['c' => 1]]]

Into: ['a.b.c' => 1] (recursive function challenge)
*/

function flattenArray($nestedArray, $prefix = ""): array
{
    $result = [];
    foreach ($nestedArray as $key => $value) {
        // add current key to the prefix
        $newKey = $prefix === '' ? $key : $prefix . "." . $key;

        // if the value is an array, then go deeper and make recursive call

        if (is_array($value)) {
            $result += flattenArray($value, $newKey);
        } else {
            // If it's not an array, save the final key-value pair
            $result[$newKey] = $value;
        }
    }

    return $result;
}

$nestedArray = ['a' => ['b' => ['c' => 1]]];

$output = flattenArray($nestedArray);
print_r($output);