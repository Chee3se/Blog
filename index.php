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

$db = new Database($config);

$query_string = "SELECT * FROM posts";
$params = [];

// Category
if (isset($_GET["category"])&&$_GET["category"]!=NULL) {
    $query_string .= " LEFT JOIN categories ON posts.category_id = categories.id WHERE categories.name = :category";
    $params[":category"] = $_GET["category"];
}
// ID
if (isset($_GET["id"])&&$_GET["id"]!=NULL) {
    if (isset($_GET["category"])&&$_GET["category"]!=NULL) {
        $query_string .= " AND posts.id=:id";
    } else {
        $query_string .= " WHERE id=:id";
    }
    $params[":id"] = $_GET["id"];
}

// Send querry
$posts = $db->execute($query_string, $params);

echo "<form>";
echo "<input name='id' placeholder='ID' value='".($_GET["id"] ?? '')."'/>";
echo "<input name='category' placeholder='Category' value='".($_GET["category"] ?? '')."'/>";
echo "<button>Filter</button>";
echo "</form>";

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