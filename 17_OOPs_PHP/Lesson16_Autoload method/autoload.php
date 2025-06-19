<?php
/*  //why to write multiple require statement
require 'classes/First.php';
require 'classes/Second.php';
require 'classes/Third.php';
 */

//  __autoload() is no longer supported, use spl_autoload_register() instead

/* function __autoload($className){
    require $className . '.php';

} */

spl_autoload_register(function ($className){
    require 'classes/' . $className . '.php';
});


// When you create an object of a class that hasn't been loaded, PHP automatically calls this function and passes the class name.
$firstObj = new First();
$secondObj = new Second();
$thirdObj = new Third();

?>