<?php
require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/Card.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

if (!isset($_GET['username'])) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}
$username = $_GET['username'];

$db = new Database();
$conn = $db->connect();
$card = new Card($conn);

$stmt = $card->getCardByUserID($username);

if ($stmt->num_rows > 0) {
    $card_array = array();
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