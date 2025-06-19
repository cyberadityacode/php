<?php

class DestructClass {
    public function __construct(){
        echo "Construct Function <br>";
    }

    // called authomatically, when object is no longer required

    public function __destruct(){
        echo "Destruct Function \n";
    }

    // method

    public function sayHello($name){
        echo "Hello $name <br>";
    }
}

$dcObject = new DestructClass();

$dcObject->sayHello("Aditya Dubey")
?>