<?php


require 'product.php';
require 'test.php';

/* 
If you abstain using namespace you'll get an error.
Fatal error: Cannot declare class Product, because the name is already in use in

*/

function sayHello($name){
    echo "Hello $name From INDEX";
}

$productObj = new pro\Product();
echo "<br>";
$testObj = new testing\Product();

echo "<br>";

// to access method
// $productObj->sayHello("aditya");


// This line calls a standalone function sayHello() inside the pro namespace 
pro\sayHello("aditya");

/* 
// Option 2: Aliasing with `use`
Its more modular and cleaner approach
*/

use pro\Product as ProProduct;
use testing\Product as TestingProduct;


$productObj2 = new ProProduct();
$testObj2 = new TestingProduct();

echo "<br>" . $productObj2->someMethod('cyberaditya');
echo "<br>". pro\sayHello("Alias Calling hello");


?>