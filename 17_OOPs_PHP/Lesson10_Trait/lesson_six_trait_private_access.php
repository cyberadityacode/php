<?php

/* 
Access Private trait function from a class
*/

trait Hello {
    private function sayHello(){
        echo "Hello from [traitHello]";
    }
}

class Base {
    use Hello{
        // Hello::sayHello as public;
        Hello::sayHello as public newHello;
    }
}

$test = new Base();
// $test->sayHello();
$test->newHello();