<?php // phpcs:ignoreFile
/* 
A constant is like a variable but with three key differences:

Value cannot change once defined

No $ sign

Available globally across the script */

define( 'TEST_CONSTANT',1077 );

echo TEST_CONSTANT . PHP_EOL;

const ANOTHER_CONSTANT = 1077;

echo ANOTHER_CONSTANT;