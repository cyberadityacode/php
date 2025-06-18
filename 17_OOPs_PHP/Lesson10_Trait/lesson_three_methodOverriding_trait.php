    <?php
    /* 
    Default Functionality With Option to Customize
    Suppose you have a trait with a default logger, 
    but some classes want to implement their own logging mechanism.
    */

    trait LoggerTrait {
        public function log($message){
            error_log("[Default]". $message);
        }
    }

    // Custom Class override
    class CustomLogger {
        use LoggerTrait;
        public function log($message){
            echo "[CustomLogger] $message"; //overrides the trait method
        }
    }

    /* 

    Use case: Plugin that logs to file by default, 
    but some modules log to database or send logs via API.

    */

    $customObj = new CustomLogger();
    $customObj->log("bro you are awesome!!");