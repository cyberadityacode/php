<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling</title>
</head>

<body>
    <main>
        <form action="backend/formHandler.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter username...">

            <label for="username">Email</label>
            <input type="email" name="email" placeholder="Enter Email...">

            <label for="age">Age</label>
            <input type="number" name="age" placeholder="Enter Age...">

            <label for="favouritepet" name="favouritepet">
                <select name="favouritepet" id="favouritepet">
                    <option value="None">None</option>
                    <option value="cow">Cow</option>
                    <option value="dog">Dog</option>
                    <option value="cat">cat</option>
                </select>
            </label>

            <button type="submit">Submit</button>


        </form>
    </main>
</body>

</html>