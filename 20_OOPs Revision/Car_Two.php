<?php

/**
 * Car_two Class
 */

class Car_Two
{
    public $brand;
    public $color;

    public function drive()
    {
        echo "Driving a {$this->color} {$this->brand}";
    }
}

$myCar = new Car_Two();

$myCar->brand = "Mahindra";
$myCar->color = "Black";
$myCar->drive();