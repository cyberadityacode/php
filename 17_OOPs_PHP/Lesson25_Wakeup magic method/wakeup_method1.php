<?php

class Student{
    public $course = "Wordpress";
    private $name = "aditya";
    private $age = 31;

    public function setDetails($name,$age, $course){
        $this->name = $name;
        $this->age = $age;
        $this->course = $course;
    }

    public function __sleep(){
        return array('name', 'age');
    }

    public function __wakeup(){
         echo "Unserialized Student - Name: {$this->name}, Age: {$this->age}<br>"; //just provide course detail on unserialization
    }

}

$studentObj = new Student();

$serl = serialize($studentObj);

echo $serl; //O:7:"Student":2:{s:13:"Studentname";s:6:"aditya";s:12:"Studentage";i:31;}

echo "<br>";

$unsr = unserialize($serl);

print_r($unsr); /* It is interesting to note, I have serialized 2 properties, But when I unserialize the object it re instantiate to its original form i.e, 3 properties */
?>