<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/payment.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if ( empty($data->sender_user_id) || empty($data->amount)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$payment = new Payment($conn);

$modify_payment = $payment->modifyBalance( $data->sender_user_id, $data->amount);

if ($modify_payment) {
    http_response_code(200);
    echo json_encode(["response" => "Payment modified"]);
    die();
} else {
    http_response_code(401);
    echo json_encode(["response" => "Payment not modified"]);
    die();
}
?>