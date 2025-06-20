<?php
class Student{
    public $course;
    private $name;

    public function setName($n){
        $this->name = $n;
    }
    
    public function __isset($property){
        echo isset($this->$property);
    }
}

$studentObj = new Student();
$studentObj->course = "PHP";

echo isset($studentObj->course) ? "Yes": "No";


// Now lets set and check private propety

$studentObj->setName('cyberaditya');

echo isset($studentObj->name);


?>