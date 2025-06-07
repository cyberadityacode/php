<?php

echo "Welcome to Challenge 1 - MAP FILTER and REDUCE Simulate a Product Cart";

$products = [
    ['name' => 'Book', 'price' => 12.99],
    ['name' => 'Pen', 'price' => 1.50],
    ['name' => 'Notebook', 'price' => null],
    ['name' => 'Bag', 'price' => 29.99],
    ['name' => 'Eraser', 'price' => 0],
];

//  Step 1: Filter out products with missing or zero prices

$filteredProduct = array_filter($products, function ($product) {
    return isset($product["price"]) && $product['price'] > 0;
});

// Step 2: Apply 10% tax using array_map()

$taxed = array_map(function ($product) {
    $product['price'] *= 1.10; //add 10% tax
    return $product;
}, $filteredProduct);

// Step 3: Sum the final prices with array_reduce()

$total = array_reduce($taxed, function ($carry, $product) {
    return $carry + $product['price'];
}, 0);

echo "Total Cost (with Tax) : $ " . number_format($total, 2);

// Write a function to add a new product or update quantity if it exists.

function addUpdateProduct(array &$products, string $name, float $price): bool
{

    //valid product name
    $name = trim($name);
    if ($name === '') {
        return false;
    }

    // check for valid price

    if ($price <= 0) {
        return false;
    }

    // format price to 2 decimal place
    $price = round($price, 2);

    // check if product already exists by name

    foreach ($products as $product) {
        if (strtolower($product['name'] === strtolower($name))) {
            // update the price if different

            if ($product['price'] !== $price) {
                $product['price'] = $price;
            }
            return true; //product updated
        }
    }

    // Add new Product is product not found

    $products[] = [
        'name' => $name,
        'price' => $price

    ];

    return true; //product added
}


// Trying to add new product
$success = addUpdateProduct($products, "Pencil", 0.75);

if ($success) {
    echo "Product added Successfully";
} else {
    echo "Product could not be added";
}

print_r($products);

// updating existing product pen

addUpdateProduct($products, 'pen', 2.00);

print_r($products);

//Write a function to remove a product by name.

function removeProductByName(array &$products, string $name): bool
{
    $name = strtolower(trim($name));

    foreach ($products as $index => $product) {
        if (strtolower($product['name'] === $name)) {
            unset($products[$index]); //remove the product
            $products = array_values($products); // reindex arrays 
            return true; //product found and removed
        }

    }
    return false; //product not found
}

// practical to remove product by name

removeProductByName($products, "pen");


echo "<br>";
echo "<br>";
echo "<br>";
print_r($products);