<?php

trait Logger{
    public function log($message){
        echo "[Log] : $message <br>";
    }
}

class User{
    use Logger;
}
class Order{
    use Logger;
}
class Invoice{
    use Logger;
}

$user = new User();
$user->log("User Created");

$order = new Order();
$order->log("Order Created");

$invoice = new Invoice();
$invoice->log("Invoice Created");

