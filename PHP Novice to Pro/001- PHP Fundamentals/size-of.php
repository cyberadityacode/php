<?php // phpcs:ignoreFile

$array_test = [1,2,3,4];

echo sizeof($array_test);
echo count($array_test);

echo "<br />";
$food = array(
    'fruits' => array('orange','banana', 'apple', 'apple'),
    'veggie' => array('carrot', 'collard', 'pea')
);

echo count($food['fruits'],1); //second parameter is mod which counts internal array elements


echo "<br />";

print_r(array_count_values($food['fruits']));

