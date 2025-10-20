<?php // phpcs:ignoreFile

$array_key_test = ['red', 'green', 'blue'];

$array_colors = [
    'first'=> 'red',
    'second'=> 'green',
    'third'=>'blue',
];


echo "<pre>";
print_r(array_keys($array_key_test));

print_r(array_keys($array_colors));
print_r(array_values($array_colors));


echo (array_key_first($array_colors));

echo array_key_last($array_colors);

echo array_key_exists('first', $array_colors); //1 if key exists