<?php // phpcs:ignoreFile

$test_val = ['a'=>'red','b'=> 'green','c'=> 'blue','d'=> 'red','e'=> 'yellow'];

echo "<pre>";
print_r($test_val);

// print just values

$just_values = array_values($test_val);

print_r($just_values);

// print uniques

$unique_values = array_unique($test_val);
print_r($unique_values);

