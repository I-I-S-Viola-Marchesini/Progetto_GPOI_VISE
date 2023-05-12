<?php
require("../../common/connect.php");
require("../../model/user.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (empty($data->username) || empty($data->password)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database_Vise();
$conn = $db->connect();
$user = new User($conn);

$result = $user->login($data->username, $data->password);

if ($result != false) {
    $account_id = $result->fetch_assoc()["user_name"];
    
    if($account_id == null){
        http_response_code(401);
        echo json_encode(["response" => false]);
        die();
    }

    http_response_code(200);
    echo json_encode(["response" => true, "username" => $account_id]);
} else {
    http_response_code(401);
    echo json_encode(["response" => false]);
}

die();
?>