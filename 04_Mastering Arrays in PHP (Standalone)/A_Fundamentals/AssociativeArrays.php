<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Associative Arrays</title>
</head>

<body>
    <h1>Associative Arrays</h1>
    <p>
        Create an array storing a user's name, email, and age.

        Update the age.

        Add a new key location.

        Loop through and display each key and value.</p>

    <?php
    $userDetails = ["name" => "aditya", "email" => "adityadubey793@gmail.com", "age" => 31];
    print_r($userDetails);
    echo "<br>";
    echo "User Age Before: - " . $userDetails['age'];
    // updating age
    $userDetails["age"] = 32;
    echo "<br>";
    echo "User Age Updated: - " . $userDetails['age'];

    // Adding new key location
    
    $userDetails["location"] = "jabalpur";

    echo "<br>";
    echo "User Location is " . $userDetails["location"];
    echo "<br>";
    print_r($userDetails);

    echo "<br>";

    // Loop throught and display each key and value
    
    foreach ($userDetails as $key => $value) {
        echo "<br> Key is ". ucfirst($key)  ." and Value is $value";
    }
    ?>
</body>

</html>