<?php
/*
 * Import the JSON data from achme_broker.json into the MySQL Database. 
 */

include_once './config/Database.php';

// Connect to database
$database = new Database(); 

// convert the json to a PHP object
$json = file_get_contents('achme_broker.json');

$decoded_json = json_decode($json, true);

$client_name = $decoded_json['client']['name'];
$client_policies = $decoded_json['client']['policies'];

// Create table structure
$sql_client_table = "
    CREATE TABLE client(
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        PRIMARY KEY(id)
    )";

$sql_policy_table = "
    CREATE TABLE policy(
        id INT(11) NOT NULL AUTO_INCREMENT,
        client_id INT(11) NOT NULL,
        customer_name VARCHAR(50),
        customer_address VARCHAR(50),
        premium DECIMAL(15,2),
        policy_type VARCHAR(50),
        insurer_name VARCHAR(50),
        PRIMARY KEY(id),
        FOREIGN KEY(client_id) REFERENCES client(id)
    )";


if($database->insert($sql_client_table) && $database->insert($sql_policy_table)) {

    $sql_add_client_name = "INSERT INTO client (name) VALUES ('".$client_name."')";
    $database->insert($sql_add_client_name);

    foreach($client_policies as $policy) {

        $sql = "INSERT INTO policy 
            (client_id, customer_name, customer_address, premium, policy_type, insurer_name) 
            VALUES (
                1,
                '".$policy['customer_name']."',
                '".$policy['customer_address']."',
                '".$policy['premium']."',
                '".$policy['policy_type']."',
                '".$policy['insurer_name']."'
            )";
        if(!$database->insert($sql)) {
            echo "There was an error adding a data row";
        }
    }

    echo "Import was successful"; 
} else {
    echo "Data is already imported"; 
}