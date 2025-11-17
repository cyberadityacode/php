<?php // phpcs:ignoreFile

declare( strict_types = 1 );

class User {
    public int $age;
    public string $fullname;

    public function getDetails() :string {
        return "Name is {$this->fullname} and Age is {$this->age}";
    }
}

$u = new User();
$u->age = 32;
// $u->age = "32"; //Fatal error: Uncaught TypeError: Cannot assign string to property User::$age of type int in /home/aditya/Desktop/ideawp/app/public/learn/php/PHP Novice to Pro/002- Fundamentals Part 2/strict_typing_2.php on line 16
$u->fullname = "aditya dubey";

echo $u->getDetails();
