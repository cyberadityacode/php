<?php


class Person {
    public $name;
    public $skills;

    public function __construct($name, $skills) {
        $this->name = $name;
        $this->skills = $skills;
    }

    public function __clone() {
        // Custom logic during cloning
        $this->name .= " (copy)";
    }
}

$p1 = new Person("Aditya", ["PHP", "MySQL"]);
$p2 = clone $p1;

echo $p2->name;  // Output: Aditya (copy)


?>