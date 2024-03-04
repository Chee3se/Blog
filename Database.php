<?php
//initiate connection with database and execute querrys?
class Database {
    public function execute() {
        //Connection string (host, db, name, pass)
        $connection_string = "mysql:host=localhost;dbname=blog_petersons;user=root;password=;charset=utf8mb4";

        //Connect with database
        $pdo = new PDO($connection_string);

        //Prepare the SQL statement
        $query = $pdo->prepare("SELECT * FROM posts");

        //Execute the prepared SQL statement
        $query->execute();

        //Get the response as an associative array
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 }
?>