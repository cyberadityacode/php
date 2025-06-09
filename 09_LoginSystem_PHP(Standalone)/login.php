<?php
require_once "includes/signup_view.inc.php";
require_once "includes/config_session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login System PHP(Standalone)</title>
</head>

<body>

    <main>


        <section class="login-section">
            <h4>Login System PHP (Standalone)</h4>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Enter your username">
                <input type="password" name="password" placeholder="Enter your password">
                <button type="submit">Login</button>
            </form>
        </section>

        <section class="signup-section">
            <h4>Signup</h4>
            <form action="includes/signup.inc.php" method="post">
                <?php
                signupInput();
                ?>

                <button type="submit">Signup</button>
            </form>

            <?php
            checkSignupError();
            ?>
        </section>
    </main>
</body>

</html>