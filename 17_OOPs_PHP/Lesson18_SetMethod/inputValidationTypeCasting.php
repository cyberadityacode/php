<?php

class Product{
    private $price;

    public function __set($name, $value){
        if($name === 'price'){
            if(!is_numeric($value) || $value <0){
                throw new Exception("Invalid Price");
            }
            $this->price = (float) $value;
        }
    }

    public function __get($name){
        if($name === 'price'){
            return $this->price;
        }
    }
}

$productObj = new Product();
$productObj->price = 1077; //Fatal error: Uncaught Error: Cannot access private property Product::$price 

echo $productObj->price; 
?>