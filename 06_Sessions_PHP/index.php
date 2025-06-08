<?php
    session_start();
    
    $_SESSION["username"]= "aditya dubey";

    // unset specific session variable
    // unset($_SESSION["username"]);

    // unset entire session of the page
    // session_unset();

    // stop session , even though I have created session variable it will be used for one time only in this page, I can't carry forward this session variable to another page because it will purge once I leave this page.

    //before destroying session, some unset it
    // session_unset();

    session_destroy()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Fundamentals</title>
</head>
<body>
    <h1>Session Fundamentals</h1>

    <?php
        echo $_SESSION["username"];
    ?>
</body>
</html>