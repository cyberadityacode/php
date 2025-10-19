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
