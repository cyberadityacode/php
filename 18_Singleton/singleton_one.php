<?php

class Singleton{
    private static $instance = null;
    
    // Private constructor to prevent direct object creation
    private function __construct(){}

    // Prevent Cloning

    private function __clone(){}


    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function doSomething(){
        echo "I am doing something";
    }



}

$singletonObject = Singleton::getInstance();
$singletonObject->doSomething();