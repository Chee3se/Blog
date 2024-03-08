<?php
//initiate connection with database and execute querrys?
class Database {

    private $connection;

    public function __construct($config) {
        $connection_string = "mysql:".http_build_query($config,"",";");
        $this->connection = new PDO($connection_string);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    public function executeQuery($query, ) {
        $query = $this->connection->prepare($query);
        $query->execute();
        return $query;
    }

    public function __destruct() {
        $this->connection = null;
    }
 }
?>