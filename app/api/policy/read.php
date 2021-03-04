<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Policy.php';

$policy = new Policy();
$result = $policy->getPolicies();

echo $result; 

?>