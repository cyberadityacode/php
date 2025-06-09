<?php
require_once 'config.php';
$_SESSION['something'] = "thank you universe";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        echo $_SESSION['something'];
    ?>
</body>

</html>