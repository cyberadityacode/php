<?php

trait Hello {
    public function sayHello(){
        echo "Hello Everyone [Trait Hello]";
    }
}

class Base {
    use Hello;
    protected function sayHello(){
        echo "Hi Everyone [class Base]";
    }
}
class Derived extends Base{
    use Hello;
    public function sayHello(){
        echo "Howdy Everyone [class Derived]";
    }
}

$derivedObject = new Derived();
$derivedObject->sayHello(); //order of precedence: derived class > trait > Base



