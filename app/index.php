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

$policy = new Policy($db); 

$result = $policy->read();
$num = mysqli_num_rows($result);

if($num > 0) {
    print_r($num);
} else {
    echo "No rows yet!";
}

echo "No errors?";



?>