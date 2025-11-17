<?php // phpcs:ignoreFile

// Single Line Comment
# Another Single Line Comment


$some_var = 1077; // inline comment

/* 
Multiple line
Comment
*/

/**
 * Doc Block Comment by Professionals - Logs in user
 * 
 * @param string $email
 * @param string $password
 * @return bool
 */
function login( string $email, string $password ) : bool {
    // logic
    return true;
}

// Another way

    /**
     * @var string $token User auth token
     */
    // public string $token;

