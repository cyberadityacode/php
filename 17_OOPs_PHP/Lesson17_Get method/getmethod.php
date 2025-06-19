<?php

class User{
    private $name  = "aditya";

    public function __get($propertyName){
        echo "Are you an archeologist? Since, You are trying to access Non Existing or Private Property [$propertyName]";
    } 
}

$userObj = new User();



// $userObj->name; 
/* Fatal error: Uncaught Error: Cannot access private property User::$name ;  */

$userObj->anything;
/* 
Warning: Undefined property: User::$anything  */

// To address this fatal error of private property and warning of undefined property, lets declare get magic method
?>