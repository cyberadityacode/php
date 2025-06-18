<?php

interface ParentOne
{
    // protected $a; //Interfaces may not include properties. 

    // Cannot have properties (before PHP 7.4). 
    // Typed properties were allowed inside interfaces, but only constants, not regular instance properties.

    const VERSION = "1.0"; //ALLOWED

    //  Access type for interface method ParentOne::calc() must be public
    public function calc(int $a, int $b);

}

interface ParentTwo
{
    public function sub(int $c, int $d);
}

class ChildClass implements ParentOne, ParentTwo
{
    const VERSION = "2.0";
    public function calc(int $a, int $b)
    {
        return $a + $b;
    }
    public function sub(int|float $a, int|float $b)
    {
        return $a - $b;
    }
}

$childObject = new ChildClass();
// $output = $childObject->calc(1,2);

echo $childObject->calc(1, 2);

echo "<br>";

echo $childObject->sub(9.8, 2);
echo "<br>";
echo "Parent Version: " . ParentOne::VERSION . "<br>";
echo "Child Version: " . ChildClass::VERSION . "<br>";

// Type Declarations (PHP 7+):