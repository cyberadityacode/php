<?php // phpcs:ignoreFile
/* 
By default, PHP is chill — it automatically converts types when needed.
Example: passing "5" (string) to a function expecting an integer will still work.

But when you enable strict typing, PHP stops being flexible and becomes strict like a teacher with a scale

It will not convert types automatically, and mismatched types will throw an error.
*/

declare( strict_types=1 );

function add(int $a, int $b ) : int {
    return $a + $b;
}

echo add(5,6);
 
// echo add( "5", 6 ); // Fatal error: Uncaught TypeError: add(): Argument #1 ($a) must be of type int, string given

