<?php

declare(strict_types=1);

function checkLoginErrors(): void
{
    if (isset($_SESSION["errors_login"]) && is_array($_SESSION["errors_login"])) {
        echo "<br>";

        foreach ($_SESSION["errors_login"] as $error) {
            echo "<p class='form-error'>" . htmlspecialchars($error) . "</p><br>";
        }

        unset($_SESSION["errors_login"]);
    } elseif (isset($_GET['login']) && $_GET['login'] === 'success') {
        echo "<br>";
        echo "<p class='login-success'>Login successful!</p>";
    }
}
