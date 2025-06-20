<?php

class LogEntry{
    private $message;
    private $level;

    public function __construct($message, $level){
        $this->message = $message;
        $this->level = $level;
    }

    public function __toString(){
        return "[$this->level] {$this->message}";
    }
}

$log = new LogEntry("error", "File Not Found");
file_put_contents("app.log", $log . PHP_EOL, FILE_APPEND);

?>