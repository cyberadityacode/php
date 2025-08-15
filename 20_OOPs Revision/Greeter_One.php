<?php

/**
 * Summary of Greeter_One
 */
class Greeter_One
{
    public $name;

      /** 
       * Constructor
       * 
       * @return void 
       * */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /** 
     * Greet Function 
     * 
     * @return void 
     * */
    public function greet()
    {
        echo "Hello, {$this->name}";
    }
}

$greeter = new Greeter_One("Aditya");
$greeter->greet();