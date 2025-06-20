<?php

class EventHandler{
    function __invoke($event){
        echo "Event Triggered $event";
    }
}

function trigger($callback){
    $callback("Login");
}

trigger(new EventHandler()); //without invoke - Fatal error: Uncaught Error: Object of type EventHandler is not callable 
?>