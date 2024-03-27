<?php
$page_title = "Create a post";

require "Database.php";
$config = require "config.php";
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];
    $num = $_POST["category_id"];
    $count = $db->execute("SELECT COUNT(*) FROM categories", [])[0]["COUNT(*)"];
    $title = trim($_POST["title"]);
    if (strlen($title) == 0 || strlen($title) > 255) 
    {
        $errors["title"] = "Nedrikst but tukss";
    }
    if (floor($num) != $num || $num > $count || $num < 1) 
    {
        $errors["category_id"] = "Nepareizs kategorijas id";
    }
    
    if (empty($errors)) 
    {
        $query = "INSERT INTO posts (title, category_id) VALUES (:title, :category_id)";
        $params = [":title" => $_POST["title"], ":category_id" => $_POST["category_id"]];
        $db->execute($query, $params);
        header("Location: /");
        die();
    }
}

require "views/posts-create.view.php";