<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Policy.php';

$database = new Database();
$db = $database->connect();

echo "AWESOME"; 
$policy = new Policy($db);

// Blog post query
$result = $policy->read();
$num = $result->rowCount();

if($num > 0) {
//     $policy_arr = array();
//     $policy_arr['data'] = array();
    
//     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
//         extract($row); 

//         $policy_item = array(
//             'id' => $id,
//             'client' => $client,
//             'customer_name' => $customer_name,
//             'customer_address' => $customer_address,
//             'premium' => $premium,
//             'policy_type' => $policy_type,
//             'insurer_name' => $insurer_name
//         );

//         array_push($policy_arr['data'], $policy_item);
//     }

//     // Turn to JSON
//     echo json_encode($policy_arr);

// } else {
//     // No Posts
//     echo json_encode(
//         array('message' => 'No Posts found');
//     );
}

?>