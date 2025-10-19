<?php // phpcs:ignoreFile

echo "Multidimensional Array <br />";

$emp = [
    [1, "abc", "alpha", 50000],
    [2, "def", "beta", 60000],
    [3, "xyz", "gamma", 70000],
];

foreach($emp as $a) {
    print_r($a);
    echo "<br />";
}

echo "<br />";

// Printing all values
foreach($emp as $row) {
    foreach($row as $col){
        echo "$col ";
    }
    echo "<br />";
}

echo "<br />";

// printing total emp
echo count($emp);

echo "<br />";


// printing only salary

foreach($emp as $row) {
    echo $row[count($row)-1];
    echo "<br />";
}

// printing highest salary
echo "<br />";

$highest_salary = max(array_column($emp, 3));
echo $highest_salary;

