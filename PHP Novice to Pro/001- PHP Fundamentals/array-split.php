<?php // phpcs:ignoreFile

$str = "aditya dubey";

$newStr = str_split($str);
echo "<pre>";
print_r($newStr);


$chunkSplit = chunk_split($str,1,'..');
echo "<pre>";
// print_r($chunkSplit);
echo is_array($chunkSplit) ?  "Yes": "string";
echo $chunkSplit;
