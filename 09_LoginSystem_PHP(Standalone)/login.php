<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
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
        <h3>
            <?php
            outputUsername();
            ?>
        </h3>
        <section class="login-section">

            <?php
            if (!isset($_SESSION["user_id"])) { ?>
                <h4>Login System PHP (Standalone)</h4>
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="username" placeholder="Enter your username">
                    <input type="password" name="password" placeholder="Enter your password">
                    <button type="submit">Login</button>
                </form>
                <?php
            }
            ?>


            <?php
            checkLoginErrors();
            ?>
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

    <h4>Logout </h4>
    <form action="includes/logout.inc.php" method="post">

        <button type="submit">Logout</button>
    </form>

</body>

</html>