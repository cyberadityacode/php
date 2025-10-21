<?php // phpcs:ignoreFile

$numbers = [1, 2, 3, 4];

$squares = array_map(function($n){
    return $n * $n;
}, $numbers);

$square_short = array_map(fn($n)=> $n *$n, $numbers);

echo "<pre>";
print_r($squares);


print_r($square_short);


$users = [
    ["id" => 1, "name" => "Aditya", "email" => "aditya@example.com"],
    ["id" => 2, "name" => "Rohit", "email" => "rohit@example.com"],
    ["id" => 3, "name" => "Sneha", "email" => "sneha@example.com"]
];


// extract specific field from database
$extract_email = array_map(fn($u)=> $u['email'], $users);
print_r($extract_email);

/* 
Formatting Data Before API Response
upper case the name, alter price from $ to Rs.
*/

$products = [
    ["name" => "Keyboard", "price" => 1500],
    ["name" => "Mouse", "price" => 600],
];

$formatted_products = array_map(fn($p)=> ["product_name" => strtoupper($p["name"]) , "product_price" => $p["price"]*90],$products);

print_r($formatted_products);