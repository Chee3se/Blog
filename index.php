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

echo "<form>";
echo "<input name='id'/>";
echo "<button>Filter by ID</button>";
echo "</form>";

echo "<form>";
echo "<input name='category'/>";
echo "<button>Filter by Category</button>";
echo "</form>";

$db = new Database($config);

$query_string = "SELECT * FROM posts";
$params = [];

// ID
if (isset($_GET["id"])&&$_GET["id"]!=NULL) {
    $query_string .= " WHERE id=:id";
    $params[":id"] = $_GET["id"];
}
// Category
if (isset($_GET["category"])&&$_GET["category"]!=NULL) {
    $query_string .= " LEFT JOIN categories ON posts.category_id = categories.id WHERE categories.name = :category";
    $params[":category"] = $_GET["category"];
}

// Send querry
$posts = $db->execute($query_string, $params);

echo "<h1>Posts</h1><br>";

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