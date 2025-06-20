<?php

$data = ["name"=>"aditya", "age"=>31];

$serialized = serialize($data);
echo $serialized;
//a:2:{s:4:"name";s:6:"aditya";s:3:"age";i:31;}

// to unserialize

$original = unserialize($serialized);

print_r($original);
?>