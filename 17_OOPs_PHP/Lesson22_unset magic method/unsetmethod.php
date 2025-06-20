<?php

class Student {
    public $course = "PHP";
    private $name = "aditya";

    public function setName($n){
        $this->name = $n;
    }

    public function __unset($property){
        unset($this->$property);
        echo "Unset done";
    }
}

$studentObj = new Student();
echo $studentObj->course;

unset($studentObj->course); //Warning: Undefined variable $course

echo $studentObj->course;
// echo $studentObj->name;// Fatal error: Uncaught Error: Cannot access private property Student::$name 
unset($studentObj->name);

print_r($studentObj);
?>