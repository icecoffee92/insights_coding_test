<?php
// $host = 'db';
// $user = 'root';
// $password = 'secret';
// $db = 'insights';

// $conn = new mysqli($host, $user, $password, $db);

// if($conn->connect_error) {
//     echo 'connection failed' . $conn->connection_error;
// } else {
//     echo 'Sucessfully connected to SQL';
// }

include_once './config/Database.php';
include_once './models/Policy.php';

$database = new Database();
$db = $database->connect();

echo "AWESOME"; 

$policy = new Policy($db); 

$result = $policy->read();

print_r($result); 

foreach($result as $r) {
    ?>
    <p><?php echo $r['client']; ?></p>
    <p><?php echo $r['customer_name']; ?></p>
    <p><?php echo $r['customer_address']; ?></p>
    <p><?php echo $r['premium']; ?></p>
    <p><?php echo $r['policy_type']; ?></p>
    <?php
}


?>