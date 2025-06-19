<?php

class APIClient{
    public function __call($methoName, $args){
        echo "Trying to call $methoName with arguments";
        print_r($args);
    }
}

$client = new APIClient();
$client->getUser(1077); // // no method getUser defined

$client->createPost("Post Title", "Post Body");
?>