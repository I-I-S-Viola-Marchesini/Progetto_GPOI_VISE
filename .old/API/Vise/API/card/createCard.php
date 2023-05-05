<?php
require("../../Common/connect.php");
require("../../Model/card.php");
require("../../Model/user_card.php");


header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (empty($data->userID) || empty($data->card_name) || empty($data->institute_communication_token) || empty($data->expiration_date)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

if (empty($data->billing_address_id)) {
    $data->billing_address_id = null;
}

$db = new Database_Vise();
$conn = $db->connect();
$card = new Card($conn);

$result_card = $card->createCard($data->card_name, $data->institute_communication_token, $data->expiration_date, $data->billing_address_id);

if ($result_card == false) {
    http_response_code(401);
    echo json_encode(["response" => "Card not created"]);
    die();
}

$user_card = new User_Card($conn);
$ID = $data->userID;

$result_association = $user_card->createUserCard($ID, $result_card->insert_id);

if($result_card != false){
    http_response_code(200);
    echo json_encode(["response" => "Card created"]);
}else{
    http_response_code(401);
    echo json_encode(["response" => "Card not created"]);
}

die();
?>