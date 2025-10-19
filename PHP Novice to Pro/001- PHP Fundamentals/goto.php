<?php // phpcs:ignoreFile

for($a=1; $a<=10; $a++){
    if($a==3){
        echo "Hello Number $a";
        goto abc;
    }
    echo $a . "<br />";
}
echo "something";
abc:
echo "goto executed label abc";
