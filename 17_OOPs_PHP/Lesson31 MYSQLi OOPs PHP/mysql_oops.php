<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supercrud";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed :" .$conn->connect_error );
}

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo "ID: {$row['task_id']} - {$row['task_name']} <br>";
    }
}else{
    echo "No Result Found";
}

$conn->close();
?>