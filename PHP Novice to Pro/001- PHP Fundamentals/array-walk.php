<?php // phpcs:ignoreFile

$fruits = ['apple', 'banana', 'cherry'];

array_walk($fruits, "myFunction", "something");

function myFunction($value, $key, $param) {
    echo "$key $param $value <br />" ;
}