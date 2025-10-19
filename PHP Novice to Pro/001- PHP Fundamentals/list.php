<?php // phpcs:ignoreFile

$data = ["aditya", "dubey", "ujjain"];

list($first_name, $last_name, $city) = $data;

echo "$city";

echo "<br />";

// skipping 2nd element
list($fn,,$c) =$data;
echo "$fn";

function getUserInfo() {
    return ["aditya", "dubey", 32];
}

list($f_n, $l_n, $age) = getUserInfo();
echo $age;

echo "<br />";

$users = [
    [1, 'Aditya'],
    [2, 'Mahadev'],
    [3, 'Narmada'],
];

foreach($users as list($id,$name)){
    echo "user #$id : $name <br />";
}


// Working with Exploded Strings

$line = "aditya, dubey, 32";

list($first,$second,$age) = explode(',',$line);

echo $age;

// Modern PHP Enhancement: Array Destructuring (PHP 7.1+)

/* list() has a modern shorthand: square bracket destructuring
(which works identically but is cleaner). */

[$name,$place, $country] = ["Mahakal", "Ujjain", "India"];
echo $country;