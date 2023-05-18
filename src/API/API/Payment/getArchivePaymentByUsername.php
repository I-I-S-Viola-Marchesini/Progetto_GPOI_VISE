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

try{
    $stmt = $transaction->getArchivePaymentByUsername($username);
}catch(Exception $ex){
    http_response_code(500);
    die(json_encode(["message" => "Internal server error"]));
}

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
?>