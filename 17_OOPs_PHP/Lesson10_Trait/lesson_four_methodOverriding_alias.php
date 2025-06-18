<?php
/* 
Default Functionality With Option to Customize
Suppose you have a trait with a default logger, 
but some classes want to implement their own logging mechanism.
*/

trait LoggerTrait
{
    public function log($message)
    {
        error_log("[Default]" . $message);
    }
}

// Custom Class override
class CustomLogger
{
    use LoggerTrait {
        LoggerTrait::log as defaultLog; //aliasing trait method
    }
    public function log($message)
    {
        echo "[CustomLogger] $message"; //overrides the trait method
    }
    public function logToDefault($message)
    {
        $this->defaultLog($message); // calls the aliased trait method
    }
}

/* 

Use case: Plugin that logs to file by default, 
but some modules log to database or send logs via API.

*/

$customObj = new CustomLogger();
$customObj->log("bro you are awesome!!");
$customObj->logToDefault("This goes to default logger"); //Apache: /var/log/apache2/error.log

/* 
You can use insteadof in use trait{}
*/