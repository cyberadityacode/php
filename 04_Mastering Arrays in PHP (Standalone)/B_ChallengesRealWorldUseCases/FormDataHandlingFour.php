<?php

// 1. Simulate form submission ($_POST)
$_POST = [
    "name" => "aditya dubey",
    "email" => "adityadubey793@gmail.com",
    "age" => '', // empty age (invalid)
];

// 2 Initialize data and errors array
$data = [];
$errors = [];

// 3 Validate 'name' required
if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required';
} else {
    $data['name'] = trim($_POST['name']);
}

// 4 Validate Email Required and Validate format of Email

if (empty($_POST['email'])) {
    $errors['email'] = "Email is Required";
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid Email Format';
} else {
    $data['email'] = trim($_POST['email']);
}

// 5 Validate Age (Optional) but, it must be a number if given
if(!empty($_POST['age'])){
    if(!is_numeric($_POST['age']) || (int) $_POST['age'] <=0){
        $errors['age'] = "Age must be a positive number";
    }else{
        $data['age']= (int) $_POST['age'];
    }
}

// 6 Display Results

if(!empty($errors)){
    echo "Validation Error: <br>";
    foreach($errors as $field => $message){
        echo "- $field: $message";
    }
}else{
    echo "Form Data is Valid";
    print_r($data);
}

