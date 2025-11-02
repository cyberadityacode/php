<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Example 1</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>
</body>
</html>

<?php //phpcs:ignoreFile

if(isset($_FILES['image'])){
    echo "<pre>";
    print_r($_FILES);
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_temp = $_FILES["image"]["tmp_name"];
    $file_type = $_FILES["image"]["type"];

    // We can define condition

    if(move_uploaded_file($file_temp, "uploads/" . $file_name)){
        echo "File Uploaded Successfully!";
    }else{
        echo "Error uploading file";
    }

}
