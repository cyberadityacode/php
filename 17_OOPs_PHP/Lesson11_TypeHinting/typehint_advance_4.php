<?php

class School{
    public function getNames(Student $names){
       foreach($names->names() as $name){
        echo "$name <br>";
       } 
    }
}
class Student{
    public function names(){
        return ["mahadev", "shambhu", "shankar"];
    }
}

$schoolObject = new School();
$studentObject = new Student();

$schoolObject->getNames($studentObject);
?>