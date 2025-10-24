<?php // phpcs:ignoreFile

// array_reduce(array, callback, initial);

// Shopping Cart Total
$cartItems = [
    ['product' => 'Laptop', 'price' => 999.99, 'quantity' => 1],
    ['product' => 'Mouse', 'price' => 25.50, 'quantity' => 2],
    ['product' => 'Keyboard', 'price' => 75.00, 'quantity' => 1],
    ['product' => 'Monitor', 'price' => 199.99, 'quantity' => 1]
];

$totalPrice = array_reduce($cartItems, function($total, $item){
    return $total + ($item['price'] * $item['quantity']);
}, 0);

echo "Total Price is $totalPrice";


// Sales data
$sales = [
    ['month' => 'Jan', 'amount' => 15000, 'region' => 'North'],
    ['month' => 'Jan', 'amount' => 12000, 'region' => 'South'],
    ['month' => 'Feb', 'amount' => 18000, 'region' => 'North'],
    ['month' => 'Feb', 'amount' => 14000, 'region' => 'South']
];

// Total Sales by month

$totalSalesByMonth = array_reduce($sales, function($result, $sale){
    $month = $sale['month'];
    if(!isset($result[$month])){
        $result[$month] =0;
    }
    $result[$month] += $sale['amount'];
    return $result;
},[]);

// Total sales by region

$totalSaleByRegion = array_reduce($sales, function($result,$sale){
    $region = $sale['region'];
    if(!isset($result[$region])){
        $result[$region] =0;
    }
    $result[$region] += $sale['amount'];
    return $result;
},[]);

echo "<pre>";
print_r($totalSaleByRegion);

echo "<pre>";
print_r($totalSalesByMonth);