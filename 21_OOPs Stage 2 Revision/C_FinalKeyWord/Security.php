<?php

/**
 * Lesson 3 – The final Keyword
 * final method → cannot be overridden
 * final class → cannot be inherited 
 * */

// final class Security
class Security
{
    final public function check()
    {
        echo "Security Check Completed";
    }
}


/* 
PHP Fatal error:  Class CustomSecurity cannot extend final class Security 
*/
class CustomSecurity extends Security
{
    // PHP Fatal error:  Class CustomSecurity cannot extend final class Security 
    public function check()     //
    {
        echo "Custom Security Check";
    }
}
