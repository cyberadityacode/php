<?php

class Personal
{
    protected static $name = "cyberaditya";
    public function show()
    {
        // echo self::$name;
        echo static::$name;
    }
}

class Accounts extends Personal
{
    protected static $name = "aditya";
}

$test = new Accounts();
// $test->show(); //cyberaditya
$test->show(); //after alteration from self to static ; outcome will be aditya