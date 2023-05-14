<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/card.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->userID) || empty($data->expiration_date) || empty($data->billing_address) || empty($data->id_payment_gateway)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$card = new Card($conn);

$result_card = $card->insertCard($data->userID, $data->expiration_date, $data->billing_address, $data->id_payment_gateway);

if ($result_card == false) {
    http_response_code(401);
    echo json_encode(["response" => "Card not created"]);
    die();
} else {
    http_response_code(201);
    echo json_encode(["response" => "Card created"]);
    die();
}

?>