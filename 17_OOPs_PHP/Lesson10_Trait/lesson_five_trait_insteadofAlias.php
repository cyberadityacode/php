<?php

trait Hello{
    public function sayHello(){
        echo "Hello From [traitHello]";
    }
}

trait Hi {
    public function sayHello(){
        echo "Hi from [traitHi]";
    }
}
class Base{
    use Hello, Hi{
        Hello::sayHello insteadOf Hi;
        Hi::sayHello as newHello;
    }
}

$test = new Base();
$test->sayHello();

echo "<br>";
$test->newHello();