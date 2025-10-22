<?php // phpcs:ignoreFile

$products = [
    ["id" => 101, "name" => "Laptop", "price" => 1200],
    ["id" => 102, "name" => "Mouse", "price" => 25],
    ["id" => 103, "name" => "Keyboard", "price" => 45],
    ["id" => 104, "name" => "Monitor", "price" => 200],
];

echo "<pre>";
print_r($products);

$prices = array_column($products, 'price');
print_r($prices);

$prices_id_index = array_column($products, 'price', 'id');

print_r($prices_id_index);

// total of prices.

echo array_sum($prices_id_index);

// which product is costlier

$max_index = array_search(max($prices_id_index), $prices_id_index);

echo "<br />";
echo $max_index;
// name of product.

$costliest = array_filter($products, fn($p)=> $p['id'] == $max_index);
// $costliest_product = reset($costliest); // get the first (and only) match
// echo "<br />Costliest Product: " . $costliest_product['name'];

print_r($costliest); // returns the array of costliest element

echo $costliest[0]['name'];

$costliest_product = reset($costliest); //
print_r($costliest_product);