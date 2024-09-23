<?php

namespace core;

class Persistence {
    
    private $connection;

    public function __construct() {

        $this->connection = mysqli_connect(
            getenv('MYSQL_HOST'),
            getenv('MYSQL_USER'),
            getenv('MYSQL_PASSWORD'),
            APP_DATABASE
        );

        if($this-> connection->connect_error) {
            die('falha na conexão'. $this->connection->connect_error);
        }
        
        $sql = 'CREATE TABLE IF NOT EXISTIS user (
                id INT(6) AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                weight INT(6) NULL
                );';

    }


    public function __destruct() {
        $this->connection->close();
    }
}