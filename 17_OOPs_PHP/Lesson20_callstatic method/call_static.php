<?php

class User {

    private static function hello(){
        echo "Hello Static Function";
    }

    public static function __callStatic($methodName, $args){
        // echo "Calling Private or Non Existing Static Method[$methodName]";
        if(method_exists(__CLASS__, $methodName)){
            call_user_func_array([__CLASS__, $methodName], $args);
        }else{
            echo "Non Existing Static Method is Called";
        }
    }
}

User::hello(); //Fatal error: Uncaught Error: Call to private method User::hello() from global scope 

echo "<br>";
User::hi(); 
?>