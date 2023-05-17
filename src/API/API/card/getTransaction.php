<?php
require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/payment.php");

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
$transaction = new Payment($conn);

$transactionValue = $transaction->getPaymentOnSenderCardID($username);

if (!$transactionValue) {
    http_response_code(404);
    echo json_encode(["response" => "No transactions found"]);
    die();
} else {

    http_response_code(200);
    echo json_encode([$transactionValue]);
    die();
}
?>