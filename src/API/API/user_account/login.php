<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/account.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->username_email) || empty($data->password)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$login = new UserAccount($conn);

if (strpos($data->username_email, "@") !== false) {
    $stmt = $login->loginEmail($data->username_email, $data->password);

    if ($stmt->num_rows > 0) {
        $row = $stmt->fetch_assoc();
        $user_arr = array(
            "id" => $row['id']
        );
        http_response_code(200);
        echo json_encode($user_arr);
    } else {
        http_response_code(401);
        echo json_encode(["message" => "Wrong email or password"]);
    }
} else if (strpos($data->username_email, "@") !== true) {
    $stmt = $login->loginUsername($data->username_email, $data->password);

    if ($stmt->num_rows > 0) {
        $row = $stmt->fetch_assoc();
        $user_arr = array(
            "id" => $row['id']
        );
        http_response_code(200);
        echo json_encode($user_arr);
    } else {
        http_response_code(401);
        echo json_encode(["message" => "Wrong username or password"]);
    }
}


?>