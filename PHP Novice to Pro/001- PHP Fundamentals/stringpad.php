<?php // phpcs:ignoreFile

// add padding to a string

$string_test = "aditya";

echo str_pad($string_test,10,".", STR_PAD_LEFT) . "<br />";

echo str_pad($string_test,10,".", STR_PAD_RIGHT). "<br />";
echo str_pad($string_test,10,".", STR_PAD_BOTH). "<br />";

// repeat string for a particular time

echo str_repeat($string_test,7);