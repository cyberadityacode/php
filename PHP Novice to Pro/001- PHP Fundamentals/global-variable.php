<?php // phpcs:ignoreFile

echo "Global Variable";

$a = 1;

function accessVar(){
    global $a;
    return $a;
}

echo accessVar();