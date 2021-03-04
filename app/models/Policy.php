<?php
class Policy {
    // DB Properties
    private $db;
    private $table = 'policy';

    public function __construct() {
        $this->db = Database::getInstance(); 
    }

    public function getPolicies() {
        $sql = "SELECT
                c.name as client_name, 
                p.id,
                p.client_id,
                p.customer_name,
                p.customer_address,
                p.premium,
                p.policy_type,
                p.insurer_name
            FROM
            " . $this->table . " p 
            LEFT JOIN
                client c ON p.client_id = c.id
            ORDER BY
                p.id DESC";
                
        if($result = $this->db->query($sql)) {
            return json_encode($result); 
        }
    }
}

?>