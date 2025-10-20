<?php // phpcs:ignoreFile

$test_slice = array('a','b','c','d','e');

echo "<pre>";
print_r(array_slice($test_slice, 2, count($test_slice))); 

//bottom 2 values slice

print_r(array_slice($test_slice, -2, count($test_slice)));