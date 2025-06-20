<?php
namespace myNamespace;

trait myTrait{
    public function getTraitName(){
        return __TRAIT__;
    }
}

echo "Line Number: ". __LINE__;

echo "<br>";

echo "Full Path of this file is : ". __FILE__;

echo "<br>";

echo "Full Path of this directory is : ". __DIR__;
echo "<br>";

echo "The Function Name is : ". __FUNCTION__; //empty because it works inside function

function myFunction(){
    echo "The Function Name is : ". __FUNCTION__; //empty because it works inside function
}

myFunction();


echo "<br>";
class MyClass{
    use myTrait;
    public function getClassName(){
        echo "The name of the class is : ". __CLASS__;
        echo "<br> The Name of this method is: ". __METHOD__;
    }
}

$classObj = new MyClass();
$classObj->getClassName();


echo "<br>";
echo "<br>";


echo "The namespace is : ". __NAMESPACE__;

echo "<br>";
$classObj->getTraitName();
?>