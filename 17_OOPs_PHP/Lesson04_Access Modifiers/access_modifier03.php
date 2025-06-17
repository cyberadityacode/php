<?php
/* 
Case 3 - Where private property of base class can be access by derived class using constructor

Access Modifiers:
    public = properties and methods can be accessed from anywhere.
    protected= allow only inherited(derived) class to access methods or properties [no one else can access those propeties or methods]
    private = allow only self class to access, methods or properties can't be accessed even if it is derived


*/
class base
{
    private $name;

    public function __construct($n = "cyberaditya")
    {
        $this->name = $n;
    }
    public function show()
    {
        echo "Your Name:  $this->name";
    }
}

class derived extends base
{
    public function show()
    {
        echo $this->name;
    }

}

$derivedObj = new derived("aditya");

// $derivedObj->show(); //cant access private property of base class

// But I can initialize by own name property

$derivedObj->name = "Aditya Dubey";

$derivedObj->show();