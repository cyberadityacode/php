<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get example</title>
</head>
<body>
    <form action="get.php" method="post">
        <input type="text" name="fname" placeholder="First Name...">
        <input type="number" name="age" placeholder="Age...">

        <button type="submit">Submit</button>
    </form>
</body>
</html>



<?php // phpcs:ignoreFile

echo "<pre>";
print_r($_GET);
print_r($_POST);
print_r($_REQUEST);


print_r($_SERVER);

echo $_SERVER['PHP_SELF'];