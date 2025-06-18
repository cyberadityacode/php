<?php

class Hello{
    public function sayHello(){
        echo "Hello Everyone";
    }
}

class Bye{
    public function sayBye(){
        echo "Bye Everyone";
    }
}

function wow(Hello $c){
    $c->sayHello();
}

/* $test = new Bye(); //intentionally creating Bye instance
wow($test); //Fatal error: Uncaught Error: Call to undefined method Bye::sayHello() 
 */

// One you add Hello as type declaration in wow 
// Fatal error: Uncaught TypeError: wow(): Argument #1 ($c) must be of type Hello, Bye given, called in


// to solve this issue create an instance of Hello

$testHello = new Hello();
wow($testHello); //Hello Everyone
?>