<?php // phpcs:ignoreFile

$a = "Hello <b>World</b>, Hello <i>Earth</i>";


echo strip_tags($a); // removes the html tags

echo wordwrap($a); //executes the html