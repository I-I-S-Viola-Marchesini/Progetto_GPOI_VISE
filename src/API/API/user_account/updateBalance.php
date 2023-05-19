<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/user_account.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->username) || empty($data->amount)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$update = new UserAccount($conn);

try{
    $updateValue = $update->updateBalance($data->username, $data->amount);
}catch(Exception $e){
    http_response_code(500);
    echo json_encode(["response" => "Internal server error"]);
    die();
}

if ($updateValue < 1) {
     http_response_code(404);
     echo json_encode(["response" => "Update failed"]);
     die();
 } else if ($updateValue == 1){
     http_response_code(200);
     echo json_encode(["response" => "Update successful"]);
     die();
 }else{
    http_response_code(500);
     echo json_encode(["response" => "Too many rows updated(?)"]);
     die();
 }
?>