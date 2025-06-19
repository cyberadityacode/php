<?php
/* 
Method chaining in PHP is a programming technique \
where multiple method calls are made on the same object 
in a single line, one after another.
 This works because each method returns the object itself ($this), 
 allowing you to call the next method on that same object.
*/

class MethodChaining {
    public function firstMethod(){
        echo "First Method <br>";
        return $this;
    }
    public function secondMethod(){
        echo "Second Method <br>";
        return $this;
    }
    public function thirdMethod(){
        echo "Third Method <br>";
    }
}

$methodChainingObject = new MethodChaining();
//  Uncaught Error: Call to a member function secondMethod() on null
// Therefore, return $this to return calling object on called method
$methodChainingObject->firstMethod()->secondMethod()->thirdMethod();

?>