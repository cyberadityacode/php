<?php


for ($i = 0; $i < 5; $i++) {
    echo $i;
}

function greet($name)
{
    return "Hello, $name";
}

echo greet("Aditya");

echo "<br>";

$colors = ["red", "green", "blue"];
echo $colors[1]; //green

foreach ($colors as $color) {
    echo "<br>";
    echo $color;
}

echo "<br>";
echo "<br>";

$user = [
    "name" => "Aditya",
    "email" => "aditya@gmail.com",
];

echo $user["email"]; //ASSOCIATIVE ARRAY $user has key $email

echo "<br>";
echo "<br>";

class User
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function displayInfo()
    {
        echo "Name: $this->name, Email: $this->email";
    }

}

$user1 = new User("aditya", "adityadubey@mp.gov.in");

$user1->displayInfo();


/* 

| Statement      | Behavior on Failure            |
| -------------- | ------------------------------ |
| `include`      | Warns, continues execution     |
| `require`      | Fatal error, stops execution   |
| `require_once` | Same as require, but only once |

*/

// Define an array of users using associative arrays
$users = [
    [
        "name" => "Alice Smith",
        "email" => "alice@example.com",
        "role" => "Editor"
    ],
    [
        "name" => "Bob Johnson",
        "email" => "bob@example.com",
        "role" => "Administrator"
    ],
    [
        "name" => "Charlie Brown",
        "email" => "charlie@example.com",
        "role" => "Subscriber"
    ]
];


// Output user data

echo "<br>";

echo "<h1>User List</h1><ul>";

foreach ($users as $user) {
    echo "<li?><strong>Name:</strong> {$user['name']} | <strong>Email:</strong> {$user['email']}| <strong>Role:</strong> {$user['role']}</li>";
    echo "<br>";
}
echo "</ul>";