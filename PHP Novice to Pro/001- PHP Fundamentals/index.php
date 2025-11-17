<?php // phpcs:ignoreFile

echo "Welcome to Index.php <br>";

echo getcwd();

echo "<br />";

echo __DIR__;
echo "<br />";

$files = scandir(getcwd()); // scan the directory in pwd

print_r($files);
// Skip current and parent directory entries
echo "<br />";

foreach($files as $file) {
    if( $file === '.' || $file === '..'){
        continue;
    }
    echo $file . PHP_EOL;
}
?>