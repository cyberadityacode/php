<?php // phpcs:ignoreFile

$test_find = array(1,2,3,3,4);

echo in_array(3,$test_find);

echo "<br />";

echo array_search(3, $test_find); // return first found index


