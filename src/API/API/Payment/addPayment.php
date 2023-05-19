<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/payment.php");
require(__DIR__ . "/../../Model/user_account.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->sender_user_id) || empty($data->sender_card_id) || empty($data->receiver_user_id) || empty($data->payment_date) || empty($data->amount)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$payment = new Payment($conn);

$add_payment = $payment->addNewTransaction($data->sender_user_id, $data->sender_card_id, $data->receiver_user_id, $data->payment_date, $data->amount);

if ($add_payment) {
    http_response_code(200);
    echo json_encode(["response" => "Payment added"]);
    die();
} else {
    http_response_code(401);
    echo json_encode(["response" => "Payment not added"]);
    die();
}
?>