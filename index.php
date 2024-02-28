<?php
require "functions.php";

echo "Sveiks!<br>";

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
    echo $post["title"]."<br>";
}

dd($posts);
?>