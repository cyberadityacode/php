<?php // phpcs:ignoreFile

$fruits = ["orange", "apple", "banana", "grape"];
echo "<pre> Before Sorting <br />";
print_r($fruits);

// Normal sort (ascending)
sort($fruits);
echo "<pre> After Sorting <br />";
print_r($fruits);


// Reverse sort (descending)
rsort($fruits);

print_r($fruits);

// asort() - Associative array sorting by values

$inventory = [
    "widget_a" => 150,
    "widget_b" => 75,
    "widget_c" => 200
];

asort($inventory);
print_r($inventory);

// arsort() - Associative array reverse sorting by values

arsort($inventory);
print_r($inventory);

// 2. Key-Based Sorting
// ksort() - Sorting by keys

$config = [
    "z_log_level" => "debug",
    "a_database" => "mysql",
    "m_cache" => "redis"
];
ksort($config);
print_r($config);

// krsort() -Reverse Sorting by keys
krsort($config);
print_r($config);

// 3. User-Defined Sorting

$products = [
    ["name" => "Laptop", "price" => 999, "rating" => 4.5],
    ["name" => "Mouse", "price" => 25, "rating" => 4.2],
    ["name" => "Keyboard", "price" => 75, "rating" => 4.7]
];
echo "before product sorting";
print_r($products);

// sort by prices
usort($products, function($a,$b){
    return $a['price'] - $b['price'];
});

print_r($products);

// sort by rating descending.
usort($products, function($a,$b){
    return $b['rating'] <=> $a['rating'];
});

print_r($products);

// substr