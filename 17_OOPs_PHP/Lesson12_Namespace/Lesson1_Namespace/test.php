<?php

namespace testing{
    
class Product{
    public function __construct(){
        echo "Hello from Test class";
    }

    public function sayHello(string $name){
        echo "Hi $name I am [Test]";
    }
}
}

?>
