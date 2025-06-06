<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Expression in PHP</title>
</head>

<body>
    <h1>Match Expression in PHP</h1>
    <?php
    $day = "Sunday";
    $todayDate = date("d-m-Y");
    $todayDay = date("l");

    $message = match ($day) {
        "Monday", "Tuesday" => "Yeah...Start of the Week!",
        "Friday" => "Almost Weekend!",
        "Sunday" => "Rest Day." ,
        default => "$day, Just another amazing day!",
    };

    echo $message;
    echo "Today's date is $todayDate and day is $todayDay";
    ?>
</body>

</html>