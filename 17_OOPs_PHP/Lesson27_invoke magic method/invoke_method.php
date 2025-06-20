<?php
class Greeting {
    public function __invoke($name){
        echo "Hello $name";
    }
}

$greenObj = new Greeting();
echo $greenObj("Aditya"); // without invoke->  Fatal error: Uncaught Error: Object of type Greeting is not callable
?>