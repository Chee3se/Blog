<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Posts</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="./elephant.png">
</head>
<body><?php

require "functions.php";

echo "<h1>Sveiks!<h1><br>";

//Connection string (host, db, name, pass)
$connection_string = "mysql:host=localhost;dbname=blog_petersons;user=root;password=;charset=utf8mb4";
//Connect with database
$pdo = new PDO($connection_string);
//Prepare the SQL statement
$query = $pdo->prepare("SELECT * FROM posts");
//Execute the prepared SQL statement
$query->execute();
//Get the response as an associative array
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
//Output each post title in frontend

foreach ($posts as $post) {
    echo "<h2>".$post["title"]."</h2>";
}

dd($posts);

?></body>
</html>