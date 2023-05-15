<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/user_account.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

if(!isset($_GET['username'])){
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$username = $_GET['username'];

$db = new Database();
$conn = $db->connect();
$balance = new UserAccount($conn);

$result_balance = $balance->getUserAccountOnUsername($username);

$result_balance = $result_balance->fetch_assoc();

if($result_balance == false){
    http_response_code(401);
    echo json_encode(["response" => "User not found"]);
    die();
}
else{
    http_response_code(200);
    echo json_encode($result_balance);
    die();
}

?>