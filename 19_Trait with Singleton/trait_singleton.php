<?php

trait SingletonTrait
{
    public static function getInstance()
    {
        static $instance = [];

        $called_class = get_called_class();

        if(!isset($instance[$called_class])){
            echo "Hello";
            $instance[$called_class] = new $called_class();
        }

        return $instance[$called_class];
    }
}

class User{
    use SingletonTrait;

    public function __construct(){
        // echo "User";
    }
}

$user_one = User::getInstance();
$user_two = User::getInstance(); //Previous instance is used, instead of new instance creation
