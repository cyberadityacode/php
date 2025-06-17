<?php

class employee
{
    public $name, $age, $salary;

    function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function getDetails()
    {
        echo "Name:  $this->name <br>";
        echo "Age:  $this->age <br>";
        echo "Salary:  $this->salary <br>";
    }
}
class manager extends employee
{
    public $incentive = 10000;


    public function getDetails()
    {
        echo "Name of manager $this->name <br> Total Salary(Including Incentives) of Manager is : " . $this->salary + $this->incentive;
    }

}

$managerObj = new manager('Aditya', 31, 85000);

$managerObj->getDetails();

echo "<br>";
$employeeObj = new employee("some name", 50, 300000);

$employeeObj->getDetails();