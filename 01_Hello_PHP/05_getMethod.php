<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>05_getMethod php</title>
</head>
<body>
    <h1>Lesson 5 - 05_getMethod.php</h1>
    <p>pass ?name=aditya to the url</p>
    <p>append fields by &place=jabalpur</p>

    <?php 
        $name = $_GET["name"];
        $place = $_GET["place"];
        echo "Name is ". $name ." and place is ". $place;
    ?>
    <h1><a href="06_getMethodSafe.php">Lesson 06 Get Method Safe</a></h1>
</body>
</html>