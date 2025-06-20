<?php
// Copy by value 
$a = 7;
$b = $a;
$b = 9;

echo $a; //7  - no change in a because b copied it by value not by reference
echo "<br>";

// Copy By Reference - Deep Copy

$x = 7;
$y = & $x;
$y = 9;

echo $x; // 9 ; because $y has copied x by reference.
// With classes by default its copy by reference
?>