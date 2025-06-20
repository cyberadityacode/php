<?php

class Product{
    private $name;
    private $price;

    public function __construct($name,$price){
        $this->name =$name;
        $this->price = $price;
    }

    public function __toString(){
        return "{$this->name} - ₹{$this->price}";
    }
}

$productObj = new Product("Laptop", 50000);

echo $productObj;

?>