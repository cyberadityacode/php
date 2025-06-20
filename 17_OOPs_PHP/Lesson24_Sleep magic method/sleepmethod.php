<?php

class Student{
    public $course = "PHP";
    private $name = "cyberaditya";
    private $age = 31;
    public function setName($name){
        $this->name = $name;
    }
    public function __sleep(){
        return array("name");
    }

}
$obj = new Student();
$obj->setName("aditya");

$srl = serialize($obj);
echo $srl; //BEFORE SLEEP MAGIC METHOD= O:7:"Student":3:{s:6:"course";s:3:"PHP";s:13:"Studentname";s:6:"aditya";s:12:"Studentage";i:31;}

// after= O:7:"Student":1:{s:13:"Studentname";s:6:"aditya";}
?>