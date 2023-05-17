<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/card.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->user_id) || empty($data->pan) || empty($data->expiration_date) || empty($data->billing_address) || empty($data->card_token) || empty($data->credit_circuit)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$card = new Card($conn);

$result_card = $card->insertCard($data->user_id, $data->pan, $data->expiration_date, $data->billing_address, $data->card_token, $data->credit_circuit);

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