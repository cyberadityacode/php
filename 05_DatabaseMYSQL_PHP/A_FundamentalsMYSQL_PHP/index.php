<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database PHP Fundamentals</title>
</head>

<body>
    <h1>Database PHP Fundamentals</h1>
    <h1>SignUp</h1>
    <div>
        <h1>Create User</h1>

        <form action="includes/formhandler.inc.php" method="post">
            <input type="text" name="username" , placeholder="enter username">
            <input type="password" name="password" , placeholder="enter password">
            <input type="email" name="email" placeholder="Enter email">

            <button type="submit">SignUp</button>

        </form>
    </div>


    <div>
        <h1>Update User</h1>

        <form action="includes/userupdate.inc.php" method="post">
            <input type="text" name="username" , placeholder="enter username">
            <input type="password" name="password" , placeholder="enter password">
            <input type="email" name="email" placeholder="Enter email">

            <button type="submit">Update</button>

        </form>
    </div>

    <div>
        <h1>Delete User</h1>

        <form action="includes/userdelete.inc.php" method="post">
            <input type="text" name="username" , placeholder="enter username">
            <input type="password" name="password" , placeholder="enter password">

            <button type="submit">Delete</button>

        </form>
    </div>



</body>

</html>