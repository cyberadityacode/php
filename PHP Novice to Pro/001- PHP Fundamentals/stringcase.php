<?php // phpcs:ignoreFile

$string_test = "aditya dubey";

echo strtoupper($string_test) . "<br />"; // all upper

echo strtolower($string_test). "<br />"; // all lower

echo ucfirst($string_test). "<br />"; // first letter upper

echo lcfirst($string_test).  "<br />"; //first letter lower

echo ucwords($string_test). "<br />"; // first letter of every word upper

echo strlen($string_test). "<br />"; // length of string

echo str_word_count($string_test); // count total words in a string


echo "<br />";

echo substr_count($string_test, 'd'); // counts the number of iterations for a particular sub string

