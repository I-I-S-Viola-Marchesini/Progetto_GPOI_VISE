<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

include_once __DIR__ . "/../../Model/payment.php";
include_once __DIR__ . "/../../Common/connect.php";

$database = new Database();

$conn = $database->connect();

$payment = new Payment($conn);

$input_data = json_decode(file_get_contents("php://input"));

if (!empty($input_data)) {

    if (property_exists($input_data, 'paymentID')) {
        $stmt = $payment->GetPaymentOnID($input_data->paymentID);
        if ($stmt->num_rows > 0) {
            $payment_array = array();
            while ($record = mysqli_fetch_assoc($stmt)) // Trasforma una riga in un array e lo fa per tutte le righe di un record.
            {
                $payment_array[] = $record;
            }
            $json = json_encode($payment_array);
            echo $json;
            return $json;
        } else {
            echo "No record";
            http_response_code(204);
        }
    }
    else{
        http_response_code(400);
        die(json_encode(array("Message" => "Bad request")));
    }
} else {
    http_response_code(503);
    echo json_encode(array("Message" => 'Error'));
}



?>