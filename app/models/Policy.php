<?php
class Policy {
    // DB Properties
    private $conn;
    private $table = 'policy';

    // Policy Properties
    public $id;
    public $client;
    public $customer_name;
    public $customer_address;
    public $premium;
    public $policy_type;
    public $insurer_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM policy";
            // SELECT
            //     c.name as client_name,
            //     p.id,
            //     p.client,
            //     p.customer_name,
            //     p.customer_address,
            //     p.premium,
            //     p.policy_type,
            //     p.insurer_name
            // FROM
            // ' . $this->table . 'p 
            // LEFT JOIN
            //     client c ON p.client = c.id
            // ORDER BY
            //     p.id DESC;
        
        // Prepare statement
        // $stmt = $this->conn->prepare("SELECT * FROM policy"); 

        // // Execute Query
        // $stuff = $this->conn->query($stmt);
        // print_r($stuff);
        // $stmt->execute();

        // // while($row = $result->fetch_assoc()) {
        // //     print_r($row);
        // // });

        // // $stmt->close();
        // return $stmt;

        if($result = $this->conn->query($query)) {
            $data = array(); 
            if($result) {
                while($row = $result->fetch_object()) {
                    $data[] = $row;
                }
            }

            print_r($data);
            print_r($this->conn->query($query));
            $result->free_result();
            print_r($result); 
        }

    }
    
    // $this->conn->close();
}

?>