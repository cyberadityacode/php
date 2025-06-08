<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // No need to use htmlspecialchars unless you are outputing these variable in page

    $usersearch = htmlspecialchars($_POST["usersearch"]);


    try {
        require_once "includes/dbh.inc.php";


        $query = "SELECT * FROM comments WHERE username =:usersearch;";

        // create prepared statement
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":usersearch", $usersearch);


        $stmt->execute();

        // Fetching all data- Associative array 

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



        $pdo = null;
        $stmt = null;


    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database PHP Fundamentals</title>
</head>
<!-- PHP Code that queries the db and search comment made by a user -->

<h2>Search Result </h2>

<?php

if (empty($results)) {
    echo "<p>No Data Found!</p>";
} else {
    // var_dump($results);
    foreach ($results as $row) {
        echo "<div>";
        echo "<h3>" . htmlspecialchars($row['username']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['comment_text']) . "</p>";
        echo "<p>" . htmlspecialchars($row['created_at']) . "</p>";
        echo "</div>";
    }
}
?>
 
<body>

</body>

</html>