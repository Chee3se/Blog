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
//Get data from database and output them using HTML
$config = require "config.php";
require "functions.php";
require "Database.php";

echo "<h1>Sveiks!</h1><br>";

$db = new Database($config);
$posts = $db->executeQuery("SELECT * FROM posts")->fetchAll();

//Output each post title in frontend
echo "<ol>";
foreach ($posts as $post) {
    echo "<h2><li>".$post["title"]."</li></h2>";
}
echo "</ol>";

//Dump and Die
dd($posts);

?></body>
</html>