<?php // phpcs:ignoreFile

/* Different ways to sum array Elements */

$sample_array = [1,2,3,4,5];

// using array_sum function.
echo "using array_sum function- " .array_sum($sample_array);

echo "<br />";
// using reduce
echo "using array_reduce function -  ". array_reduce($sample_array, function($result, $element){
    return $result +$element;
},0);


echo "<br />";

// using foreach loop
$total =0;
foreach($sample_array as $values) {
    $total +=$values;
}
echo "using foreach loop- ". $total;

echo "<br />";

// using for loop
$total_for = 0;
for($i=0; $i< count($sample_array); $i++){
    $total_for += $sample_array[$i];
}
echo "using for loop - ". $total_for;

echo "<br />";

// using while loop
$total_while = 0;
$i = 0;
while($i < count($sample_array)){
    $total_while += $sample_array[$i];
    $i++;
}

echo "using while loop ". $total_while;