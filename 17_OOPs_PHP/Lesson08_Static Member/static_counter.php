<?php

class Counter
{
    public static $count = 0;
    public static function increment()
    {
        self::$count++;
    }
}

// use without an instance
Counter::increment();
Counter::increment();

echo "Counter Value: " . Counter::$count; //Output 2