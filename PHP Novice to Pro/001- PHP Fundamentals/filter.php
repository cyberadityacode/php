<?php // phpcs:ignoreFile

// Mixed user data
$users = [
    ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'active' => true, 'age' => 25],
    ['id' => 2, 'name' => '', 'email' => 'invalid-email', 'active' => false, 'age' => 17],
    ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'active' => true, 'age' => 30],
    ['id' => 4, 'name' => 'Bob', 'email' => 'bob@example.com', 'active' => true, 'age' => 16]
];

// Filter active adult users with valid email address and age greater than or equal to 18.

$filteredUsers = array_filter($users, function($user){
    return $user['active'] && filter_var($user['email'], FILTER_VALIDATE_EMAIL) && !empty(trim($user['name'])) && $user['age'] >=18;
});

echo "<pre>";
print_r($filteredUsers);


$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 999, 'stock' => 5, 'category' => 'electronics'],
    ['id' => 2, 'name' => 'Desk Chair', 'price' => 150, 'stock' => 0, 'category' => 'furniture'],
    ['id' => 3, 'name' => 'Mouse', 'price' => 25, 'stock' => 15, 'category' => 'electronics'],
    ['id' => 4, 'name' => 'Book', 'price' => 20, 'stock' => 50, 'category' => 'education']
];

// Filter in-stock electronics under $1000

$filteredProducts = array_filter($products, function($product){
   return $product['stock'] >0 && $product['category'] ==='electronics' && $product['price'] < 1000;
});

echo "<pre>";
print_r($filteredProducts);