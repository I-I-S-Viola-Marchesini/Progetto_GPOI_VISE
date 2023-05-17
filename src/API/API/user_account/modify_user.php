<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/user_account.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->name) || empty($data->last_name) || empty($data->username) || empty($data->email) || empty($data->tax_code) || empty($data->mobile_number) || empty($data->birth_date)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$update = new UserAccount($conn);

try{
    $updateValue = $update->updateUserAccount($data->username, $data->name, $data->last_name, $data->email, $data->tax_code, $data->mobile_number, $data->birth_date);
}catch(Exception $e){
    http_response_code(500);
    echo json_encode(["response" => "Internal server error"]);
    die();
}

if ($updateValue == false) {
     http_response_code(404);
     echo json_encode(["response" => "Update failed"]);
     die();
 } else {
     http_response_code(200);
     echo json_encode(["response" => "Update successful"]);
     die();
 }
?>

