<?php

declare(strict_types=1);

function signupInput(): void
{
    // Username
    if (isset($_SESSION['signupData']['username']) && !isset($_SESSION['errorsSignup']['usernameTaken'])) {
        $username = htmlspecialchars($_SESSION['signupData']['username']);
        echo '<input type="text" name="username" placeholder="Enter your username" value="' . $username . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Enter your username">';
    }

    // Password
    echo '<input type="password" name="password" placeholder="Enter your password">';

    // Email
    if (
        isset($_SESSION['signupData']['email']) &&
        !isset($_SESSION['errorsSignup']['emailUsed']) &&
        !isset($_SESSION['errorsSignup']['invalidEmail'])
    ) {
        $email = htmlspecialchars($_SESSION['signupData']['email']);
        echo '<input type="email" name="email" placeholder="Enter your Email" value="' . $email . '">';
    } else {
        echo '<input type="email" name="email" placeholder="Enter your Email">';
    }
}

function checkSignupError(): void
{
    if (isset($_SESSION['errorsSignup'])) {
        $errors = $_SESSION['errorsSignup'];
        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='form-error'>" . htmlspecialchars($error) . "</p>";
        }

        unset($_SESSION['errorsSignup']);
    } elseif (isset($_GET['signup']) && $_GET['signup'] === 'success') {
        echo "<br>";
        echo "<p class='signup-success'>Signup Successful!</p>";
    }
}
