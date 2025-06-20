<?php

class User{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function __toString(){
        return "User: ". $this->name;
    }
}

$userObj = new User("aditya");
echo $userObj;
?>