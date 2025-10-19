<?php // phpcs:ignoreFile

/* 
Recursive Function
*/

function callMe($something){
    if($something < 3){
        echo "thala";
        callMe($something+1);
    }
}

callMe(1);

echo "<br />";

// Factorial

function factorial($num){
    if($num ==0){
        return 1;
    }
    return $num * factorial($num-1);
}

echo factorial(5);
echo "<br />";

function factorialTernary($num){
    return $num ==0 ? 1 : $num* factorialTernary($num-1);
}

echo factorialTernary(5);