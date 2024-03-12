<?php
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

// Display data using view
require "views/index.view.php";
