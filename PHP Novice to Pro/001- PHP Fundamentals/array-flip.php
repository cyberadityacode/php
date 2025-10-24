<?php // phpcs:ignoreFile

$arrray_sample = [
    "Id"=>1,
    "Name"=> "aditya"
];

echo "<pre>";
print_r($arrray_sample);
print_r(array_flip($arrray_sample));

// array change key case

print_r(array_change_key_case($arrray_sample));