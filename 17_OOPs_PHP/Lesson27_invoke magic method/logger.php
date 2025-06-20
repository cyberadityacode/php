<?php

class Logger{
    public function __invoke($message){
        file_put_contents('log.txt', $message. PHP_EOL, FILE_APPEND);    }
}
/* 
callable Explained
The keyword callable is a type hint in PHP that means:

"This parameter must be something that can be called as a function."


*/
function processEvent(callable $callback){
    $callback("User Registered");
}

$loggerObj = new Logger();
processEvent($loggerObj);

?>