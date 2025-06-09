<?php


// Session id can be passed using session cookies and not via URL of the app
// This will prevent our app from session fixation
ini_set('session.use_only_cookies', 1);

// make sure that app uses only those session id's created by server of our website and make it difficult to guess session id to prevent from bruteforcing.
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800, //30mins
    'domain' => 'localhost',
    'path' => '/', //inside every page or sub directory of this app
    'secure' => true,
    'httponly' => true
]);

// now start our session

session_start();

session_regenerate_id(true); // better session id generated
// its a safe practice to regenerate session id after a periodic interval of time, so that hacker can't do session hijacking.

if (!isset($_SESSION['last_regeneration'])) {

    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();

} else {
    $interval = 60 * 30;

    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
}