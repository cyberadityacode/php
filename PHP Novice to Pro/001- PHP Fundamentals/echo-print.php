<?php //phpcs:ignoreFile

echo "aditya", "dubey";
echo "<br />";
echo 1, "one", "2", 3; // separate elements
echo "<br />";


echo "aditya" . "dubey"; //concatenation consider it as single string.

echo "<strong> Aditya </strong>";

echo('<br/>');
echo('aditya');

print('printing aditya');

$data = ['name' => 'Aditya', 'city'=> 'ujjain'];
echo json_encode($data);

echo '<br>';

$x_string = "mahadev";
$x_number = 1077;
$x_float = 1077.1063;
$x_array = [1,2,'3' , 4.1, true, [4,5,6]];

var_dump($x);
echo '<br>';
var_dump($x_number);
echo '<br>';
var_dump($x_float);
echo '<br>';
var_dump($x_string);
echo '<br>';
var_dump($x_array);
echo '<br>';

#ad
//ad
/* 
ad
ad
ad
*/

$normal_variable = "aditya";
$normal_variable = "dubey";
echo $normal_variable;

// constant variables -> whose value cannot be changed

// define('num', 1077);
define('num', 1077);


echo num;
echo '<br>';

// modulus (remainder) operator
$modulus_remainder = num%2;
echo $modulus_remainder; #output 1 because remainder is 1

