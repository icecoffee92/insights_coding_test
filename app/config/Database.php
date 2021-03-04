<?php
class Database {
    private $host = 'db';
    private $db_name = 'insights';
    private $username = 'root';
    private $password = 'secret';
    private $connection;
    private static $instance = null;

    public function __construct() {

        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db_name); 

        if($this->connection->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->connection->connect_errno . " - " . $this->connection->connect_error;
            exit();
        }

    }

    public static function getInstance() {
        if(self::$instance == null){
          self::$instance = new Database();
        }
     
        return self::$instance;
    }

    public function query($sql) {
        if($query = $this->connection->query($sql)) {

            $results = array();

            if($query) {
                while($row = $query->fetch_assoc()) {
                    $results['policies'][] = $row;
                }
            }

            return $results;
        }
    }

    public function insert($sql) {
        if($this->connection->query($sql)) {
            return true;  
        } else {
            return false; 
        }
    }
}
?>