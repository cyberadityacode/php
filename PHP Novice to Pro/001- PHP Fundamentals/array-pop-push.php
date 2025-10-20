<?php // phpcs:ignoreFile

$test_array = ['one','two', 'three'];

array_pop($test_array); //removes last element

echo "<pre>";
print_r($test_array);

array_push($test_array, "three");

echo "<pre>";
print_r($test_array);
echo "<pre />";

echo "<br />";

array_shift($test_array); //removes one from first element

echo "<pre>";
print_r($test_array);
echo "</pre>";

array_unshift($test_array, "one"); //add one in element 1

echo "<pre>";
print_r($test_array);
echo "</pre>";