<?php

class Something{


    public function __toString(){
        return "Cannot Convert Object to string : " . get_class($this);
    }
}
$someObj = new Something();
echo $someObj; //Fatal error: Uncaught Error: Object of class Something could not be converted to string


?>