<?php

class Math_Helper
{
    public static $pi = 3.14159;

    public static function square($num)
    {
        return $num * $num;
    }
}

echo Math_Helper::$pi;
echo "\n". Math_Helper::square(7);
