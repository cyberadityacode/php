<?php

class Base
{
    public static $name = "aditya";
    public static function show()
    {
        echo self::$name;
    }
    public function __construct($n)
    {
        // self::show();
        self::$name = $n;
    }
}

// echo Base::show(); //aditya
// $test = new Base(); //as soon as object is created show method is called automatically
$test = new Base("impeccable"); //as soon as object is created show method is called automatically

$test->show();

// ACCESS BASE CLASS METHOD FROM INHERITENCE

class Derived extends Base
{
    public static function display()
    {
        echo parent::$name;
    }
}

$derivedTest = new Derived("cyberaditya");
$derivedTest->display();
//impeccable cyberaditya
