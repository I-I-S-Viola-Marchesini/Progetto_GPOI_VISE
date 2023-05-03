<?php
require("../../Common/connect.php");
require("../../Model/user.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (empty($data->email) || empty($data->password)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database_Vise();
$conn = $db->connect();
$user = new User($conn);

$result = $user->login($data->email, $data->password);

if ($result != false) {
    $account_id = $result->fetch_assoc()["account_id"];
    http_response_code(200);
    echo json_encode(["response" => true, "account_id" => $account_id]);
} else {
    http_response_code(401);
    echo json_encode(["response" => false]);
}

die();
?>