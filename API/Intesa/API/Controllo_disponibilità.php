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

if (empty($data->importo) || empty($data->token)) {
    http_response_code(400);
    echo json_encode(array("message" => "Impossibile effettuare il pagamento. Dati incompleti."));
    die();
}

$pagamento = new Pagamento($db);
$importo = $data->importo;
$token = $data->token;

if ($pagamento->Controllo_disponibilita($importo, $token)) {
    http_response_code(200);
    echo json_encode(array("message" => "Credito sufficiente."));
} else {
    http_response_code(503);
    echo json_encode(array("message" => "Credito insufficiente."));
}
?>
