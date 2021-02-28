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
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        return $this->conn;


        // // if($this->conn->connect_errno) {
        // //     print_r($this->conn->connect_errno);
        // // } else {
        // //     echo "GOOD"; 
        // // }

        // try {
        //     $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        //     // $this->conn = new mysqli($this->host, $this->user, $this->pass); 

        //     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // } catch(PDOException $e) {
        //     echo 'Connection Error: ' . $e->getMessage();
        // }

        // return $this->conn;

    }
}
?>