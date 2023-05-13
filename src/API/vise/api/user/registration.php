<?php
require("../../common/connect.php");
require("../../model/account.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->name) || empty($data->last_name) || empty($data->username) || empty($data->email) || empty($data->password) || empty($data->tax_code) || empty($data->mobile_number) || empty($data->birth_date) || empty($data->registration_date)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$registration = new Account($conn);

$registrationValue = $registration->create_account($data->name, $data->last_name, $data->username, $data->email, $data->password, $data->tax_code, $data->mobile_number, $data->birth_date, $data->registration_date);

if($registrationValue == false){
    http_response_code(404);
    echo json_encode(["response" => "Registration failed"]);
    die();
}
else{
    http_response_code(200);
    echo json_encode(["response" => "Registration successful"]);
    die();
}

?>