<?php // phpcs:ignoreFile

// range(start, end, step);
$newRange = range(1,10,2);

echo "<pre>";
print_r($newRange);

// using range in foreach

foreach(range('a', 'z') as $letter){
    echo "$letter <br />";
}