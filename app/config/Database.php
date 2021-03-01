<?php
class Database {
    private $host = 'db';
    private $db_name = 'insights';
    private $username = 'root';
    private $password = 'secret';
    private $conn;

    public function connect() {
        $this->conn = null; 

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name); 

        if($this->conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->conn->connect_errno . " - " . $this->conn->connect_error;
            exit();
        }

        return $this->conn;

    }
}
?>