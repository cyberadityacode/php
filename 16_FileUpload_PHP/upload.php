<?php

if (isset($_FILES['myFile'])) {
    $file = $_FILES['myFile'];

    // get Details

    $fileName = $file['name']; //original file name
    $fileTmp = $file['tmp_name']; //temporary path
    $fileSize = $file['size']; // File Size
    $fileError = $file['error']; // File Error

    var_dump($file);
    echo (string) $fileName;
    echo '<br>';
    echo (string) $fileTmp;
    echo '<br>';
    echo (string) $fileSize;
    echo '<br>';
    echo (string) $fileError;
    echo '<br>';
    echo '<br>';

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    echo "File EXTENSION: " . $fileExt;

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

    if (!in_array($fileExt, $allowedExtensions)) {
        die("Fle type not allowed only jpg,jpeg,png,gif,pdf are allowed");
    }
    // Check if no error
    if ($fileError === 0) {
        // move file to "uploads" folder
        move_uploaded_file($fileTmp, 'uploads/' . $fileName);
        echo "<br> File Uploaded Successfully!";
    } else {
        echo "Something Went Wrong!";
    }

}