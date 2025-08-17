<?php

interface PaymentGateway
{
    public function pay(float $amount) :bool;
}

class Paypal implements PaymentGateway
{
    public function pay(float $amount): bool 
    {
        echo "Paid $amount via PayPal.";
        return true;
    }
}

class Stripe implements PaymentGateway
{
    public function pay(float $amount): bool 
    {
        echo "Paid $amount via Stripe.";
        return true;
    }
}


// Usage 

function processPayment(PaymentGateway $gateway, float $amount)
{
    $gateway->pay($amount);
}

processPayment(new Paypal(), 100.00);
processPayment(new Stripe(), 200.00);
