<?php
require("../Common/connect.php");
require("../Model/user_account.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->userID)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$balance = new UserAccount($conn);

$result_balance = $balance->getUserAccountBalance($data->userID);

$result_balance = $result_balance->fetch_assoc();

if($result_balance == false){
    http_response_code(401);
    echo json_encode(["response" => "Balance not found"]);
    die();
}
else{
    http_response_code(200);
    echo json_encode($result_balance);
    die();
}
?>