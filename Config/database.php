<?php
namespace Config;

use PDO;
use PDOException;

class Database {
    private $host = "localhost";
    private $db_name = "amigos_db";
    private $username = "root";
    private $password = "";

    public function connect() {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}