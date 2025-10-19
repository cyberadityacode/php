<?php // phpcs:ignoreFile

echo "nested loops"; 

# outer loop for rows, inner loop for columns

echo "<br />";

for( $a=1; $a<=100; $a+=10 ) {
    echo $a ."<br/>";
}

echo "<br />";

for ( $a=1; $a<=100; $a+=10 ){
    for ($b=$a; $b < $a+10; $b++){
        echo $b ." ";
    }
    echo "<br />";
}

echo "<br />";

// Using continue statement to skip 3 in 1to10 range.

for( $a=1; $a<=10; $a++ ){
    if( $a==3 ){
        continue;
    }
    echo $a . "<br />";
}

echo "<br />";

echo "<br />";

// Using Break statement to stop execution after 3 in 1to10 range.

for($a=1; $a<=10; $a++) {
    if($a==3){
        break;
    }
    echo $a . "<br />";
}