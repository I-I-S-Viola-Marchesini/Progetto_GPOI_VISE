<?php

require(__DIR__ . "/../../Common/connect.php");
require("paymentGateway.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

$_apiURI = $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];

if (empty($data->sender) || empty($data->receiver) || empty($data->amount)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();

// try{

// }catch(Exception $ex){
//     http_response_code(500);
//     echo json_encode(["message" => "Internal server error"]);
//     die();
// }

http_response_code(200);
echo json_encode(["message" => "Payment successful"]);
die();

?>