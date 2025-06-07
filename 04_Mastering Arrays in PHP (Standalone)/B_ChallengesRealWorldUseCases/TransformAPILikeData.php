<!-- 
Transform API-like Data: Simulate a JSON response from an API: 
-->

<!-- $json = '[{"id":1,"name":"John"},{"id":2,"name":"Jane"}]'; -->

<?php
// 1 original JSON string from an API
$json = '[{"id":1,"name":"John"},{"id":2,"name":"Jane"}]';

// 2 Decode JSON into associative array

$users = json_decode($json, true);

// 3 Display Names
echo "User Names <br>";

foreach($users as $user){
    echo " - ". $user['name'] . " <br>";
}

// 4 Add new name
$users[] = ["id"=>3, 'name'=> 'aditya'];

// print_r($users);

// 5 Re-encode Array back to JSON
$newJSON = json_encode($users, JSON_PRETTY_PRINT);

// 6- Updated JSON
echo "Updated JSON <br>";
echo $newJSON;


