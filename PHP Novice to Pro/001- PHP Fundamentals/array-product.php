<?php // phpcs:ignoreFile

$sample_array = [1,2,3,4,5];

// using array_product function
echo array_product($sample_array);

// using array_reduce function
echo "<br />";

echo array_reduce($sample_array, function($result, $element){
    return $result * $element;
}, 1);


