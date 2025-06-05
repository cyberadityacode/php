<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06 Get Method Safe</title>
</head>

<body>
    <h1>Lesson 06 - GET Method Safe Way</h1>

    <?php
    if (isset($_GET["name"]) && isset($_GET["place"])) {
        $name = $_GET["name"];
        $place = $_GET["place"];
        echo "Name is " . htmlspecialchars($name) . " and place is " . htmlspecialchars($place);
    } else {
        echo "Please provide name and place parameter in the URL";
    }

    ?>

    <p>Why htmlspecialchars()?
It prevents Cross-Site Scripting (XSS) if someone injects HTML or JavaScript into the URL parameters.</p>
</body>

</html>