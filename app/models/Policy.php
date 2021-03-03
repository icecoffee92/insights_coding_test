<?php
class Policy {
    // DB Properties
    private $conn;
    private $table = 'policy';

    public function __construct() {
        $this->conn = new Database();
        $this->conn = $this->conn->connect();
    }

    public function read() {
        $query = "SELECT
                c.name as client_name, 
                p.id,
                p.client,
                p.customer_name,
                p.customer_address,
                p.premium,
                p.policy_type,
                p.insurer_name
            FROM
            " . $this->table . " p 
            LEFT JOIN
                client c ON p.client = c.id
            ORDER BY
                p.id DESC";
                
        if($result = $this->conn->query($query)) {

            $policies = array();

            if($result) {
                while($row = $result->fetch_assoc()) {
                    $policies[] = $row;
                }
            }

            $data = array();
            $data['policies'] = $policies;
            
            return json_encode($data); 
        }
    }
}

?>