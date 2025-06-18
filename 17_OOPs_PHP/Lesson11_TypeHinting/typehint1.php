<?php

function sum(int $v){
    echo $v+1;
}

// sum(10);
sum('hi'); //Fatal error: Uncaught TypeError: Unsupported operand types: string + int
/* 
Once you changed to type int 

Fatal error: Uncaught TypeError: sum(): Argument #1 ($v) must be of type int, string given, called in

*/
?>