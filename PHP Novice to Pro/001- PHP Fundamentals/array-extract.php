<?php // phpcs:ignoreFile


// Extract function converts keys into variable

$colors = ['a'=> 'red', 'b'=>'green', 'c'=>'blue'];

extract($colors);

echo "value of a = $a, b= $b , c = $c";