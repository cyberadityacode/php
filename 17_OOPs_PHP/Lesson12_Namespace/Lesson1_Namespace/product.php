<?php

namespace pro;
class Product{
    public function __construct(){
        echo "Hello from product class";

        //    I can also create object of another class using namespace in present class inside constructor
        $test = new \testing\Product();
    }

   public function someMethod(string $n){
        echo "$n called someMethod";
   }



}

// Standalone function
function sayHello(string $name){
        echo "Hi $name I am [Product]";
    }

?>