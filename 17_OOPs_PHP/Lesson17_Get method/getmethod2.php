<?php

class User{
    private $attributes = [];

    public function __construct(array $data){
        $this->attributes = $data;
    }

    public function __get($key){
        return $this->attributes[$key] ?? '<br>Welcome to Level 5 of Marslow Hierarchy!';
    }
}

$user = new User(['name'=>'aditya', 'email'=> 'aditya@mpgovt.nic.in']);

// echo $user->name; //Warning: Undefined property: User::$name 
echo $user->name; //After creating __get() magic method 
echo '<br>';
echo $user->email; //After creating __get() magic method 

// now try to access non existing property
echo $user->age;

?>