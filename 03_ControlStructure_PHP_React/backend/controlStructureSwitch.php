<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Case PHP</title>
</head>

<body>
    <h1>Switch Case PHP</h1>

    <?php
    $bool = true;
    $a = 7;
    $b = 4;

    switch ($a) {
        case 1:
            echo "First case is correct";
            break;
        case 7:
            echo "Second case is correct";
            break;
        default:
            echo "None of the conditions were true";
            break;
    }


    ?>
</body>

</html>