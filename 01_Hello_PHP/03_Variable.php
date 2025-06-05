<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 3 - Variables in PHP</title>
</head>

<>
    <h1>Heading HTML h1</h1>
    <p>Hello paragraph</p>
    <?php echo "Hello" ?>

    <p>This is <?php echo "awesome" ?> paragraph </p>
    <h1>Variable in PHP</h1>

    <?php
    $name = "cyberaditya";
    $camelCase = "camelCase Convention in variable naming";
    echo $name;
    echo $camelCase;
    ?>

    <?php
    echo $camelCase;
    ?>
    <hr>

    <?php
    // Scalar Type (Contains one Value)
    $string = "string";
    $int = 1077;
    $float = 10.77;
    $bool = true;

    // Array Types (Contains multiple Values)
    // $aray = array( "aditya", "dubey", "DC") //older version of php
    $array = ["aditya", "dubey", "DC"];

    // Object Type
    // $objectType = new Car();

    ?>

    </body>

</html>