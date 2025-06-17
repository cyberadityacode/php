<!-- 
Question: What is an Abstract Class?

It’s a class you cannot create an object from directly.
It is meant to be extended by other (child) classes.
Used as a template or blueprint for other classes.

Features of Abstract Class (Easy Points):
🔹 Use the keyword abstract before class.

🔹 Cannot be instantiated directly (new ClassName() will give an error).

🔹 Can have normal methods (with code).

🔹 Can have abstract methods (without code — only the method name and parameters).

🔹 Child classes must implement all abstract methods.

🔹 Can have properties (variables).


Why Use Abstract Classes?
🔹 To force child classes to follow a structure.

🔹 To reuse common code in multiple child classes.

🔹 To organize your code in a better, object-oriented way.
-->

<?php

abstract class parentClass
{
    public $name;

    abstract protected function calc($a, $b);
}

// $obj = new parentClass(); //Cannot instantiate(create obj) abstract class 'parentClass'

class childClass extends parentClass
{

    public function calc($varA, $varB)
    {
        echo $varA + $varB;
    }

    //    Declaration of childClass::calc() must be compatible with parentClass::calc($a, $b)PHP(PHP2439)

    /*    public function calc()
       {
           echo "hello";
       } */

}

$someObject = new childClass();
$someObject->calc(10, 20);
