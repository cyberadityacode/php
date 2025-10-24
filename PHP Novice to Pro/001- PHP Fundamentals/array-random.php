<?php // phpcs:ignoreFile

$sample_array = ['red', 'green','blue'];

echo "<pre>";

print_r($sample_array);

// echo "random array element" . $sample_array[array_rand($sample_array)];

print_r(array_rand($sample_array, 2));
$newArray = array_rand($sample_array, 2);


echo $sample_array[$newArray[0]];
echo $sample_array[$newArray[1]];


shuffle($sample_array);

print_r($sample_array);