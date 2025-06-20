<?php

class GetFunctionsClass{
    public $var1;
    public $var2 = "hello";
    public $var3 = 100;
    public $var4;

    function __construct(){
        $this->var1 = "wow";
    }
    function name(){
        echo "Class Name: ". get_class($this);
    }
    function someOtherMethod(){
        echo "Some other operations";
    }
}

class GetFunctionClassDerived extends GetFunctionsClass{}

$obj = new GetFunctionsClass();
$obj->name();

echo "<br> Class name is : ". get_class($obj);

echo "<br>";

$objChild = new GetFunctionClassDerived();

echo "Parent Class Name :". get_parent_class($objChild);


echo "<br>";
echo "<br>";


print_r(get_class_methods($obj));

echo "<br>";
echo "<br>";

print_r(get_class_vars('GetFunctionsClass'));
print_r(get_class_vars(get_class($obj)));
echo "<br>";
echo "<br>";


print_r(get_object_vars($obj));


echo "<br>";
echo "<br>";


echo "<br>";
echo "<br>";


print_r(get_declared_classes());


echo "<br>";
echo "<br>";


class_alias('GetFunctionsClass', 'gfc');

$newObj = new gfc();
$newObj->name();
?>