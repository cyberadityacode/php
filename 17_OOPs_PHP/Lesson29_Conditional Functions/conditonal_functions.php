<?php

interface MyInterface{

}

class MyClass{

    public $test;
    public function myMethod(){

    }
}
class MyClassChild extends MyClass{}

if(class_exists('MyClass')){
    echo "Yes it Exists";

    $obj = new MyClass();

}else{
    echo "No";
}

if(interface_exists('MyInterface')){
    echo "<br> Yes Interface exist";

    class MyAnotherClass implements MyInterface{

    }
}else{
    echo "Interface doesn't exist";
}


echo "<br>";
$myClassObj = new MyClass();
if(method_exists($myClassObj, "myMethod")){
    echo "This method exists";
}else{
    echo "Method doesn't exist ";
}

echo "<br>";

if(property_exists('MyClass', "test")){
    echo "This property exists";
}else{
    echo "property doesn't exist ";
}

echo "<br>";

// is a object

if(is_a($myClassObj , 'MyClass')){
    echo "Yes this object belongs to MyClass";
}else{
    echo "No this object doesn't belong to MyClass";
}

echo "<br>";


$childClassObj = new MyClassChild();

if(is_subclass_of($childClassObj, 'MyClass')){
    echo "yes its a subclass";
}else{
    echo "no its not a subclass";
}

?>