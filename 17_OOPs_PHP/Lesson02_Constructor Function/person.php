<?php

class person
{
    public $name, $age, $designation;

    // all required (non-default) parameters must come before any optional ones
    function __construct($n, $des, $a = 31)
    {
        $this->name = $n;
        $this->age = $a;
        $this->designation = $des;
    }

    function show()
    {
        echo strtoupper($this->name) . " - " . $this->age . " - " . $this->designation;
    }
}

// $personObj = new person("aditya dubey", 31, "Deputy Collector");
$personObj = new person("aditya dubey", "Deputy Collector");

$personObj->show();