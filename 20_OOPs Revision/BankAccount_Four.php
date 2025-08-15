<?php

class BankAccount_Four
{
    private $_balance = 0;
    
    public function deposit($amount)
    {
        $this->_balance += $amount;
    }

    public function getBalance()
    {
        return $this->_balance;
    }
}

$account = new BankAccount_Four();
$account->deposit(1077);
echo $account->getBalance();
