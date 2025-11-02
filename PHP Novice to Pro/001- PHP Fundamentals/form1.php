<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 1</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="fname" placeholder="First Name">
        <input type="text" name="lname" placeholder="Last Name">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

<?php // phpcs:ignoreFile

if(isset($_POST['submit']) && isset($_POST['fname']) & isset($_POST['lname'])){
    echo $_POST['fname'] . ' ' . $_POST['lname'];
}

$x = 5;
function test() {
  echo $GLOBALS['x']; // Access global variable inside function
}
test(); // Output: 5

echo "<pre>";
print_r($GLOBALS);