<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="username" placeholder="enter name">
        <button type="submit">Register</button>
    </form>
</body>
</html>


<?php // phpcs:ignoreFile
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = $_POST["username"];
    // add slashes to special characters to prevent SQLinjection
    $add_slash = addslashes(trim($name));
    echo "Welcome $add_slash";
    // now remove slashes to display
    $remove_slash = stripslashes($add_slash);
    echo "<br /> $remove_slash";

    // addcslashes -> to add character slashes
    $add_char_slash = addcslashes($remove_slash,"k");
    echo "<br /> $add_char_slash";
}


