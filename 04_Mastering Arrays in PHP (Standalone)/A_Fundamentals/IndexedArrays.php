<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indexed Arrays</title>
</head>

<body>
    <h1>Indexed Arrays</h1>
    <p>
        Store names of 5 fruits.

        Print each fruit using a loop.

        Find total elements using count().
    </p>

    <?php
    $fruits = ['apple', 'mango', 'banana', 'pineapple'];
    print_r($fruits);
    echo '<br>';
    echo $fruits[0]; //first element
    echo '<br>';
    
    //conventional imperative way
    for($i=0; $i < count($fruits); $i++){
        echo "$fruits[$i] <br>";
    }
    //modern way - declarative
    echo "Declarative Way without index--- <br>";
    foreach ($fruits as $fruit){
        echo "$fruit <br>";
    }
    echo "Declarative Way with index--- <br>";
    foreach ($fruits as $index => $fruit){
        echo "$index: $fruit <br>";
    }
    // Find total elements using count()

    echo "Total Fruits: ".count($fruits);
    ?>
</body>

</html>