<?php
class Database {
    private $host = 'db';
    private $db_name = 'insights';
    private $username = 'root';
    private $password = 'secret';
    // CHANGE!!!
    public $connection;
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
        echo "Query called"; 
        if($result = $this->connection->query($sql)) {
            $policies = array();

            if($result) {
                while($row = $result->fetch_assoc()) {
                    $policies[] = $row;
                }
            }

            $data = array();
            $data['policies'] = $policies;

            return $data;
        } else {
            echo "Cannot query sql<br>";
            echo "SQL</br>";
            print_r($sql);
            echo "</br>Connection</br>";
            print_r($this->connection);
        }
    }

    public function insert($sql, $data) {

    }
}
?>