<?php // phpcs:ignoreFile

$food = ['orange', 'banana', 'apple', 'grapes'];

echo current($food);
echo next($food);
echo prev($food);
echo pos($food);
echo current($food);

echo key($food);


echo reset($food);