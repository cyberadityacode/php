<?php // phpcs:ignoreFile
 
/* 
Function argument by value and by reference

*/

function wowByValue($value){
    $value = "hi";
}

$str = "hello";

wowByValue($str);

echo $str; // prints hello as value is not changed

echo "<br />";

function wowByReference(&$value){
    $value = "hi";
}

$str_two = "hello";

wowByReference($str_two);
echo $str_two; // prints hi as value got changed due to passing of reference