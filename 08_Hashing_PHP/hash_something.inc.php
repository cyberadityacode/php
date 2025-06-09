<?php

$sensitiveData = "cyberaditya";

//generate 16 bytes of data than convert into hexadecimal
$salt = bin2hex(random_bytes(16));

// keyword which I use to fuse with hash
$pepper = "ASecretPepperString";

$dataToHash = $sensitiveData . $salt . $pepper;


$hash = hash("sha256", $dataToHash);

// re-generate on every refresh because of salt
echo "Salt: $salt  for $sensitiveData<br>";
echo "Hash: $hash";

/* Store that hash in DB */
$sensitiveDataOfUser = "cyberaditya";
$storedSalt = $salt;
$storedHash = $hash;
$pepperNeeded = $pepper;

$dataToHashForUser = $sensitiveDataOfUser . $storedSalt . $pepperNeeded;

// checking if data submitted here is same as previous data
$verificationHash = hash("sha256", $dataToHashForUser);
if($storedHash === $verificationHash){
    echo "<br> The data is same";
}else{
    echo "<br>The Data is not the same";
}



