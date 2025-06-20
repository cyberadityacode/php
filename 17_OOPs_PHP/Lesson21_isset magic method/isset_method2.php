<?php
class AnotherClass{
    private $details = ["name"=>"test", "age"=>32];

    public function __isset($name){
        echo isset($this->details[$name]);
    }
}

$anotherObj = new AnotherClass();
echo isset($anotherObj->name); //1
echo isset($anotherObj->age); //1
echo isset($anotherObj->city); //blank as 0 doesnt show up

?>