<?php
/* 
Build a system where a user can pay using multiple payment gateways
 (e.g., PayPal, Razorpay, Stripe) — without changing the core logic.
*/

// Step 1 - Define the interface
interface PaymentGateway
{
    public function pay($amount);
}

// Step 2 - Create Gateway Classes
class Paypal implements PaymentGateway
{
    public function pay($amount)
    {
        echo "Paid $amount using Paypal";
    }
}
class RazorPay implements PaymentGateway
{
    public function pay($amount)
    {
        echo "Paid $amount using RazorPay";
    }
}

class Stripe implements PaymentGateway
{
    public function pay($amount)
    {
        echo "Paid $amount using Stripe";
    }
}

// Step 3 - Create Payment Processor (Business Logic)

class PaymentProcessor
{

    private $gateway;
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function makePayment($amount)
    {
        $this->gateway->pay($amount);
    }
}

// Step 4 - Use the system

// user selects Paypal

$paypal = new Paypal();
$payment = new PaymentProcessor($paypal);
$payment->makePayment(1077);

echo "<br>";

// user selects Razor Pay

$razorPay = new RazorPay();
$payment = new PaymentProcessor($razorPay);
$payment->makePayment(1063);

echo "<br>";

// user selects Stripe

$stripe = new Stripe();
$payment = new PaymentProcessor($stripe);
$payment->makePayment(1008);