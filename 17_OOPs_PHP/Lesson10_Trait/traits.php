<?php

trait Hello
{
    public function sayHello()
    {
        echo "Hello Everyone";
    }
}

class Base
{
    use Hello;

}

$testObj = new Base();
$testObj->sayHello();