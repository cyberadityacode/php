<?php // phpcs:ignoreFile

echo "Array Basics";

$array_test = array('red', 'green', 'blue');

echo $array_test[0];
echo $array_test[1];

echo "<br />";

foreach($array_test as $index=> $value) {
    echo "$index - $value   ". "<br />";
}
echo "<br />";


print_r(array_values($array_test));
print_r(array_keys($array_test));
echo current($array_test);
echo next($array_test);
echo reset($array_test);


