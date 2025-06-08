<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Fundamentals</title>
</head>

<body>
    <h1>Example Page for session Fundamentals</h1>
    <?php
    echo $_SESSION["username"];
    ?>

</body>

</html>