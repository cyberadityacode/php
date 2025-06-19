<?php
class User{
    private $name = 'aditya';


    public function sayHello(){
        echo $this->name;
    }
    public function __get($propertyName){
        echo "You can't access Private or Non Existing Property, Are you an archeologist?";
    }

    public function __set($propertyName, $value){
        if(property_exists($this,$propertyName)){
            $this->$propertyName = $value;  //this is not a member variable hence you need to use $propertName
        }else{
            echo "<br>You cannot set private or non existing property [$propertyName -> $value] Are you a Politician?";
        }
    }

}

$userObj = new User();
echo $userObj->name; //Fatal error: Uncaught Error: Cannot access private property User::$name

$userObj->name = "cyberditya"; //Fatal error: Uncaught Error: Cannot access private property User::$name 

$userObj->sayHello(); //name changed to cyberaditya
?>