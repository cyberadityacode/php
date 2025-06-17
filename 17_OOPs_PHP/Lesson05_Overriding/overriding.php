<?php

/* 
When you create an object of derived and access $derivedObject->name, PHP uses the property from the most derived (child) class, not the parent.
*/

class base
{
    public $name = "parent class";

    public function calc($a, $b)
    {
        return $a * $b;
    }
}

class derived extends base
{
    public $name = "child class";

    public function calc($a, $b)
    {
        return $a + $b;
    }

    // to access base class calc
    public function baseCalc($a, $b)
    {
        return parent::calc($a, $b); //accessing base class method
    }
}


$derivedObject = new derived();


echo $derivedObject->name; //child class
echo "<br>";

echo $derivedObject->calc(3, 7);
echo "<br>";

echo $derivedObject->baseCalc(3, 7);
