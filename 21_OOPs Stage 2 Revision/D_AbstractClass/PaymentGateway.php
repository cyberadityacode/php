<?php

/**
 * Summary of Abstract Class
 * Abstract Class cannot be instantiated directly
 * It Can contain abstract methods (must be implemented in child).
 */
abstract class PaymentGateway
{
    abstract public function pay($amount);
    public function log($message)
    {
        echo "[LOG] $message";
    }
}

// $payment = new PaymentGateway(); //Cannot instantiate abstract class 'PaymentGateway'

class Paypal extends PaymentGateway
{
    public function pay($amount)
    {
        echo "Paid $amount using Paypal";
    }
}

$paypal = new Paypal();
$paypal->pay(1077);
