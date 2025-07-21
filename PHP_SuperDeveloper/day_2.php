<!-- Write a class with properties and methods and instantiate it -->

<?php

class Day_2
{
    // propeties

    private $name;
    private $email;
    private $role;

    // constructor method

    public function __construct($name, $email, $role = "subscriber")
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }

    // method to display user info

    public function displayInfo()
    {
        echo "Name: $this->name <br>";
        echo "Email: $this->email <br>";
        echo "Role: $this->role <br>";
    }

    // method to change role
    public function changeRole($newRole)
    {
        $this->role = $newRole;
        echo "$this->name is now a $this->role <br>";
    }

}

$user1_day2 = new Day_2("Aditya", "aditya@mp.gov.in");

$user1_day2->displayInfo();
$user1_day2->changeRole("Administrator");

$user1_day2->displayInfo();
