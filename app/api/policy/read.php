<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Policy.php';

$database = new Database();
$db = $database->connect();

$policy = new Policy($db);
$result = $policy->read();
echo $result; 

?>