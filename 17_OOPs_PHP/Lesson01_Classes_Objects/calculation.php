<?php

class calculation
{
    public $a, $b, $c;

    function sum()
    {
        $this->c = $this->a + $this->b;
        return $this->c;
    }

    function sub()
    {
        $this->c = $this->b - $this->a;
        return $this->c;
    }
}

// create an object of calculation class

$calcObj = new calculation();

$calcObj->a = 10;
$calcObj->b = 20;

echo "Total:" . $calcObj->sum();
echo "<br>";
echo "Difference: " . $calcObj->sub();

