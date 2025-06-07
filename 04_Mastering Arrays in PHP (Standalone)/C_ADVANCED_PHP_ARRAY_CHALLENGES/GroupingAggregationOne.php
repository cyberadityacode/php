<?php

/* 
Given an array of transactions with type 
(credit/debit), amount, group them by type and calculate total for each.
*/

$transactions = [
    ['type' => 'credit', 'amount' => 100],
    ['type' => 'debit', 'amount' => 50],
    ['type' => 'credit', 'amount' => 200],
    ['type' => 'debit', 'amount' => 75],
    ['type' => 'credit', 'amount' => 150],
];

$totals = [
    'credit' => 0,
    'debit' => 0
];

foreach ($transactions as $transaction) {
    $type = $transaction['type'];
    $amount = $transaction['amount'];

    if (isset($totals[$type])) {
        $totals[$type] += $amount;
    } else {
        $totals[$type] = $amount;
    }

}

print_r($totals);