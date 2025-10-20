<?php // phpcs:ignoreFile

$test_array = ['one','two', 'three'];

array_pop($test_array); //removes last element

echo "<pre>";
print_r($test_array);

array_push($test_array, "three");

echo "<pre>";
print_r($test_array);


