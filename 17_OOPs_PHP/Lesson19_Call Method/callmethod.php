<?php
class User {
    private $name;

    private function setName($n){
        $this->name = $n;
        
    }

    public function __call($methodName, $args){
        /* echo "Brother, this method ($methodName) is private or non Existing <br>";
        print_r($args); */

        if(method_exists($this, $methodName)){
            call_user_func_array([$this,$methodName], $args );
        }else{
            echo "Non Existing Method, Join Archeological Department with your $methodName";
        }
    }
    
}

$userObj = new User();
$userObj->setName("aditya"); 
/* Fatal error: Uncaught Error: Call to private method User::sayHello() from global scope  */

echo "<pre>"; 
print_r($userObj);
echo "</pre>"; 


$userObj->whatIsYourName("Something");
?>