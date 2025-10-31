<?php // phpcs:ignoreFile

include 'str_tags.php';

/* 
Includes and evaluates the specified file.
 If the file is missing, PHP shows a warning, but the script continues executing.

 Require: Includes and evaluates the specified file. 
 If the file is missing, PHP shows a fatal error, and the script stops executing immediately.
*/

// require 'str_tags.php';


echo "Ths will be executed even if the file doesn't exist";