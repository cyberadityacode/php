<?php // phpcs:ignoreFile

$test_slice = array('a','b','c','d','e');

echo "<pre>";
print_r(array_slice($test_slice, 2, count($test_slice))); 

//bottom 2 values slice

print_r(array_slice($test_slice, -2, count($test_slice)));

// Array splice

$test_splice = array('a','b','c','d','e');
$spliced_array = array_splice($test_splice, 1, 2, ['x','y']);

print_r($spliced_array);
print_r($test_splice);
