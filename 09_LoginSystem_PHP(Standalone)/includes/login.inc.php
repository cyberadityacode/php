<?php

if($_SERVER["REQUEST_METHOD"]=== "POST"){
    echo "Login Success";
}else{
    header("Location: ../login.php");
}