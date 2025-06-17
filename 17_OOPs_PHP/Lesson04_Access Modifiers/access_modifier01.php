<?php
/* 
Case 1 - Where public method of base class can be access by derived class

Access Modifiers:
    public = properties and methods can be accessed from anywhere.
    protected= allow only inherited(derived) class to access methods or properties [no one else can access those propeties or methods]
    private = allow only self class to access, methods or properties can't be accessed even if it is derived
    

*/
class base
{
    public $name;

    public function __construct($n)
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
        echo "Derived Can Access Public Base SHOW function: $this->name";
    }
}

$someDerivedObj = new derived("aditya");

$someDerivedObj->show();