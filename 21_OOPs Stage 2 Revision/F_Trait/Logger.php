<?php

trait Logger
{
    public function log($message)
    {
        echo "[LOG] : $message";
    }
}

class User
{
    use Logger;

    public function createUser($name)
    {
        $this->log("User $name created");
    }
}

class Product
{
    use Logger;

    public function addProduct($productName)
    {
        $this->log("Product $productName added");
    }
}


$user = new User();
$user->createUser("Aditya");


$product = new Product();
$product->addProduct("Laptop");
