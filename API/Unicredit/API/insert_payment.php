<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include dirname(__FILE__) . '/../Common/connect.php';
include dirname(__FILE__) . '/../Model/pagamento.php';

$database = new Database();
$db = $database->connect();

$data = json_decode(file_get_contents("php://input"));

if (empty($data->datetime) || empty($data->transaction_type) || empty($data->amount) || empty($data->reciver) || empty($data->token)) {
    http_response_code(400);
    echo json_encode(array("message" => "Payment could not be made. Incomplete data."));
    die();
}

$Payment = new Payment($db);

$datetime = $data->datetime;
$transaction_type = $data->transaction_type;
$reciver = $data->reciver;
$amount = $data->amount;
$token = $data->token;

$sender -> get_name_surname($token);
$account_number -> get_account_number($token);

if ($Payment->Withdrawal_amount($amount, $token)) {
    http_response_code(200);
    echo json_encode(array("message" => "Paid."));
    if ($transaction->registra_transazione($datetime, $transaction_type, $amount, $sender, $reciver, $account_number)) {
        http_response_code(200);
        echo json_encode(array("message" => "Recorded transaction."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Error during the payment."));
        die();
    }
} else {
    http_response_code(503);
    echo json_encode(array("message" => "Error during the payment."));
    die();
}
?>