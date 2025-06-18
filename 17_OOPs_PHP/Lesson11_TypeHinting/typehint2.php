<?php

function fruits(array $fruits){
    foreach($fruits as $fruit){
        echo $fruit . "<br>";
    }
}

// fruits(["mango", "banana", "apple", 1]);
// fruits(7); //Warning: foreach() argument must be of type array|object, int given in
// fruits(7); //when you declare type array:  Uncaught TypeError: fruits(): Argument #1 ($fruits) must be of type array, int given,



?>