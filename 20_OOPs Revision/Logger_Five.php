<?php

/**
 * Constructor (__construct) runs when an object is created.

 * Destructor (__destruct) runs when object is destroyed 
 * */ 
 
class Logger_Five
{
    public function __construct()
    {
        echo "Logger Started";
    }

    public function __destruct()
    {
        echo "Logger Ended";
    }
}

$logger = new Logger_Five();
