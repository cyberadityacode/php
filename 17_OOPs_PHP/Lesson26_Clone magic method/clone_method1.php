<?php

class Student {
    public $name;
    public $course;

    public function __construct($name){
        $this->name = $name;
    }
    public function setCourse(Course $c){
        $this->course = $c;
    }
}

class Course{
    public $cName; 

    public function __construct($cn){
        $this->cName = $cn;
    }
}

$studentObj = new Student('cyberaditya');

$anotherStudent = $studentObj;
echo $studentObj->name;

echo "<br>";

$anotherStudent->name = "aditya";

echo $studentObj->name; // copied by reference, henceforth altered studentObj
echo "<br>";

echo "<br>";


// When we don't want to copy object by reference, We use clone method

$cloneStudent = clone $studentObj;

$cloneStudent->name = "new name";

echo $cloneStudent->name; //new name

echo "<br>";

echo $studentObj->name; // last value set aditya, it clone student wont alter its reference.

echo "<br>";
echo "<br>";

$courseObj = new Course("react");


$studentObj->setCourse($courseObj);

echo "<br>";

print_r($studentObj);


echo "<br>";

print_r($cloneStudent); //it didnt copied Course Object Value
?>